<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Aseo;
use App\User;
use Auth;

class BathController extends Controller
{

    public function form(Request $request){
      $aseos = DB::table('aseos')->where('user_id', Auth::user()->id)->get()->count();
      if(Auth::user()->role->nombre == 'normal' && $aseos == 1){
        return back()->with('status', 'Ya has creado 1 Baño. Necesitas 100 puntos para poder crear baños ilimitados.');
        // $request->session()->flash('status', 'No eres golden. Necesitas 100 puntos para poder crear baños.');
        return view('pages.home');
      }else{
        return view('pages.createWC');
      }
    }

    public function create(Request $request){

      $request->validate([
        'nombre' => 'required',
        'horarioApertura' => 'nullable',
        'horarioCierre' => 'nullable',
        'horas24' => 'required',
        'precio' => 'nullable',
        'accesibilidad' => 'required'
      ]);

      $foto = $request->file('foto');
      $aseo = new Aseo();
      $aseo->nombre = $request->input('nombre');
      $aseo->latitud = $request->input('latitud');
      $aseo->longitud = $request->input('longitud');
      $aseo->dir = $request->input('dir');
      $aseo->horarioApertura = $request->input('horarioApertura');
      $aseo->horarioCierre = $request->input('horarioCierre');
      $aseo->horas24 = $request->input('horas24');

      if($foto == ''){
        $aseo->foto = 'wc.jpg';
      }else{
        // $extension = $foto->getClientOriginalExtension();
        // Storage::disk('public')->put($foto->getFileName().'.'.$extension, File::get($foto));
        $image64 = base64_encode(file_get_contents($foto)); //pasar la foto a base64

          //llamar a la api y subir la imagen
          $curl = curl_init();

          $client_id = "1cb45b7462006f";

          $token = "968ce1bbb9d5c880ba1974cfe4463f951645f7c7";

          curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.imgur.com/3/image",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array('image' => $image64),
            CURLOPT_HTTPHEADER => array(
              // "Authorization: Client-ID {{1cb45b7462006f}}",
              "Authorization: Bearer ".$token //nuestro token para acceder a la api
            ),
          ));
          $response = curl_exec($curl);
          $err = curl_error($curl);

          curl_close($curl);

          if ($err) {
            echo "cURL Error #:" . $err;
          } else {
            $json = json_decode($response);
            $aseo->foto = $json->data->link; //pilla link de la api
          }
        //$aseo->foto = $foto->getFileName(). '.' .$extension;
        // $request->foto->storeAs($pathToFile);
      }
      $aseo->precio = $request->input('precio');
      $aseo->accesibilidad = $request->input('accesibilidad');
      $aseo->user_id = Auth::user()->id;
      $user = User::where('id',$aseo->user_id)->first();
      $user->puntuacion+=20;
      $user->save();
      $aseo->save();
      return redirect()->route('home', ['latitud' => $request->input('latitud'), 'longitud' => $request->input('longitud')]);
    }

    public function edit($id){
      $aseo=Aseo::where('id',$id)->first();
      if(!$aseo){
        return redirect()->route('home');
      }else{
        if($aseo->user_id!=Auth::user()->id){
          return redirect()->route('home');
        }else{
          return view('pages.editWC', array('aseo'=>$aseo));
        }
      }
    }

    public function update(Request $request){

        $foto = $request->file('foto');
        $request->validate(['nombre'=>'string|required|min:2|max:255']);
        $aseo=Aseo::find($request->input('id'));
        $aseo->nombre = $request->input('nombre');
        $aseo->latitud = $request->input('latitud');
        $aseo->longitud = $request->input('longitud');
        $aseo->dir = $request->input('dir');
        $aseo->horarioApertura = $request->input('horarioApertura');
        $aseo->horarioCierre = $request->input('horarioCierre');
        $aseo->horas24 = $request->input('horas24');

        if($foto == ''){
          $aseo->foto = 'wc.jpg';
        }else{
        // $extension = $foto->getClientOriginalExtension();
        // Storage::disk('public')->put($foto->getFileName().'.'.$extension, File::get($foto));
          $image64 = base64_encode(file_get_contents($foto)); //pasar la foto a base64

          //llamar a la api y subir la imagen
          $curl = curl_init();

          $client_id = "1cb45b7462006f";

          $token = "968ce1bbb9d5c880ba1974cfe4463f951645f7c7";

          curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.imgur.com/3/image",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array('image' => $image64),
            CURLOPT_HTTPHEADER => array(
              // "Authorization: Client-ID {{1cb45b7462006f}}",
              "Authorization: Bearer ".$token //nuestro token para acceder a ala api
            ),
          ));
          $response = curl_exec($curl);
          $err = curl_error($curl);

          curl_close($curl);

          if ($err) {
            echo "cURL Error #:" . $err;
          } else {
            $json = json_decode($response);
            $aseo->foto = $json->data->link; //pilla link de la api
          }
        //$aseo->foto = $foto->getFileName(). '.' .$extension;
        // $request->foto->storeAs($pathToFile);
        }
        $aseo->precio = $request->input('precio');
        $aseo->accesibilidad = $request->input('accesibilidad');
        $aseo->user_id = Auth::user()->id;
        $aseo->save();
        return redirect()->route('home', ['latitud' => $request->input('latitud'), 'longitud' => $request->input('longitud')]);
    }

    public function getAseos(Request $request){
      $aseos=Aseo::where('oculto',null)
        ->whereBetween('latitud',[$request->latitud-0.05,$request->latitud+0.05])
        ->whereBetween('longitud',[$request->longitud-0.05,$request->longitud+0.05])->get();
      return $aseos;
    }

    public function ocultarAseo($id){
      $aseo = Aseo::find($id);
      if(!$aseo){
        return redirect()->route('home');
      }else{
        if($aseo->user_id!=Auth::user()->id){
          return redirect()->route('home');
        }else{
          $aseo->oculto = new \DateTime();
          $aseo->save();
        }
      }
      return redirect()->route('usuario');
    }

    public function getAseo($id){
      $aseo=Aseo::where(
        'id',$id
      )->first();
      return $aseo;
    }
    public function valorar(Request $request, $id){
      $voto = $request->voto;

      $aseo=Aseo::where('id', $id)->first();
      $aseo->valoracion()->detach(Auth::user());
      $aseo->valoracion()->attach(Auth::user(), ['puntuacion' => $voto]);

      $aseo->numPuntuacion=$aseo->valoracion()->sum('aseos_users.puntuacion');
      $aseo->countPuntuacion=$aseo->valoracion()->count();
      return $aseo;
    }

}
