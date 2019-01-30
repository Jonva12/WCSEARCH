  @extends('layout.admin')

  @section('title', 'WCSearch')

  @section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
       	var data = google.visualization.arrayToDataTable([
        ['@lang("adminContent.months")', '@lang("adminContent.users")', '@lang("adminContent.wc")'],
        @foreach($lineas as $grafico1)
            [{{$grafico1['mes']}},{{$grafico1['usuarios']}}, {{$grafico1['aseos']}}],
        @endforeach
    ]);

    var options = {
        title: '@lang("adminContent.monthly")',
        hAxis: {title: '@lang("adminContent.months")',  titleTextStyle: {color: '#333'}},
        vAxis: {title: '@lang("adminContent.users")', titleTextStyle: {color: '#333'}, minValue: 0, maxValue: 20}
    };

    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
    chart.draw(data, options);
    }
</script>
  <div class="botones">
	<a href="{{ route('admin.usuarios') }}">
		<div class="boton boton-users">
			<i class="fas fa-users" id="data"></i>
			<div class="text">
        <b>@lang('adminContent.users')</b>
        <p class="num">{{$usuarios}}</p>
      </div>
		</div>
	</a>
	<a href="{{ route('admin.aseos') }}">
		<div class="boton boton-wc">
			<i class="fas fa-map-marker-alt" id="data"></i>
			<div class="text">
				  <b> @lang('adminContent.wc')</b>
          <p class="num">{{$aseos}}</p>
      </div>
		</div>
	</a>
	<a href="{{ route('admin.mensajes') }}">
		<div class="boton boton-comments">
			<i class="far fa-envelope" id="data"></i>
			<div class="text">
			  <b>@lang('adminContent.comments')</b>
        <p class="num">{{$message}}</p>
      </div>
		</div>
	</a>
	</div>
	<form id="form-year">
		<input type="number" name="year">
		<input type="submit" name="enviar" value='@lang("adminContent.yearChange")'>
	</form>
	<div id="chart_div" style="width: 100%; height: 500px;"></div>
@endsection
