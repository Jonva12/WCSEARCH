
@extends('layout.login')

@section('title', 'Registro')

@section('content')


  <div class="masthead text-center text-white d-flex">
    <div class="container my-auto">
      <div class="column">
        <form id="login">
          <div class="img">
            <img class="img-fluid" src="img/logo.ico" alt="WCSearch">
          </div>
           <div class="form-group">
               <input type="email" class="form-control" id="inputEmail" placeholder="Email Address">
           </div>
           <div class="form-group">
               <input type="password" class="form-control" id="inputPassword" placeholder="Password">
           </div>
           <div class="forgot">
              <a href="reset.html">Forgot password?</a>
            </div>
           <button type="submit" class="btn btn-primary">Login</button>
       </form>
      </div>
    </div>
  </div>



  @endsection
