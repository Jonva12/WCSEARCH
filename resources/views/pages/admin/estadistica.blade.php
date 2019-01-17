@extends('layout.admin')

  @section('title', 'WCSearch')

  @section('content')
	<div id="chart_div" style="width: 100%; height: 500px;"></div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['mes', 'usuarios'],
            @foreach($lineas as $grafico)
                [{{$grafico['mes']}},{{$grafico['usuarios']}}],
            @endforeach
        ]);

        var options = {
            title: 'Usuarios Mensuales',
            hAxis: {title: 'Meses',  titleTextStyle: {color: '#333'}},
            vAxis: {title: 'Usuarios', titleTextStyle: {color: '#333'}, minValue: 0, maxValue: 10}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
  </body>
@endsection