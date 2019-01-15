google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Usuarios', 'meses', 'Año'],
      @foreach($grafico1 as $g)
        ['{{$g->usuarios}}','{{$g->mes}}','{{$g->año}}'],
      @endforeach
    ]);

    var options = {
      title: 'Usuarios Mensuales',
    };

    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
      chart.draw(data, options);
  }