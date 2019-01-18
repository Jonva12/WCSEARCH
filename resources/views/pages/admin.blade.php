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
        vAxis: {title: '@lang("adminContent.users")', titleTextStyle: {color: '#333'}, minValue: 0, maxValue: 10}
    };

    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
    chart.draw(data, options);
    }
</script>
  <div class="botones">
	<a href="{{ route('admin.usuarios') }}">
		<div class="boton">
			<i class="fas fa-users"></i>
			<p>
				<b>{{$usuarios}}</b> @lang('adminContent.users')
			</p>
		</div>
	</a>
	<a href="{{ route('admin.aseos') }}">
		<div class="boton">
			<i class="fas fa-map-marker-alt"></i>
			<p>
				<b>{{$aseos}}</b> @lang('adminContent.wc')
			</p>
		</div>
	</a>
	<a href="{{ route('admin.mensajes') }}">
		<div class="boton">
			<i class="far fa-envelope"></i>
			<p>
				<b>{{$message}}</b> @lang('adminContent.comments')
			</p>
		</div>
	</a>
	</div>
	<form id="form-year">
		<input type="number" name="year">
		<input type="submit" name="enviar" value='@lang("adminContent.yearChange")'>
	</form>
	<div id="chart_div" style="width: 100%; height: 500px;"></div>
@endsection