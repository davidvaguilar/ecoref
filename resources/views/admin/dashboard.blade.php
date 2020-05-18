@extends('admin.layout')

@section('content')
    <!--<h1>Dashboard</h1>
    <p>Usuario autenticado: {{ auth()->user()->name }} </p>-->
  <div class="col-md-6">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Total de Ordenes por Fecha</h3>
      </div>
      <div class="box-body">
        <div class="chart">
          <canvas id="bar-orders" style="height:230px"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Total de Ordenes por Usuario</h3>
      </div>
      <div class="box-body">
        <div class="chart">
          <canvas id="bar-users" style="height:230px"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Reporte de Tipo de Ordenes</h3>
      </div>
      <div class="box-body">
        <canvas id="pie-types" style="height:250px"></canvas>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Problemas reportados</h3>
      </div>
      <div class="box-body">
        <canvas id="pie-problems" style="height:250px"></canvas>
      </div>
    </div>
  </div>

@stop

@push('scripts')
  <script src="{{ asset('adminlte/bower_components/chart.js/Chart.js') }}"></script>
  <script>
    
    var pieChartCanvas = $('#pie-types').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = {!! $types !!}
    var pieOptions     = {
      segmentShowStroke    : true,
      segmentStrokeColor   : '#fff',
      segmentStrokeWidth   : 2,
      percentageInnerCutout: 50,
      animationSteps       : 100,
      animationEasing      : 'easeOutBounce',
      animateRotate        : true,
      animateScale         : false,
      responsive           : true,
      maintainAspectRatio  : true,
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    pieChart.Doughnut(PieData, pieOptions)

    var pieChartCanvas = $('#pie-problems').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = {!! $problems !!}
    pieChart.Doughnut(PieData, pieOptions)


    var areaChartData = {
      labels: {!! $orders_dates !!},
      datasets: [
        {
          label: 'Ordenes de trabajo',
          fillColor           : '#36a2eb',
          strokeColor         : '#36a2eb',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data: {!! $orders_quantity !!},
        }
      ]
    }
    var barChartCanvas                   = $('#bar-orders').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    var barChartOptions                  = {
      scaleBeginAtZero        : true,
      scaleShowGridLines      : true,
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      scaleGridLineWidth      : 1,
      scaleShowHorizontalLines: true,
      scaleShowVerticalLines  : true,
      barShowStroke           : true,
      barStrokeWidth          : 2,
      barValueSpacing         : 5,
      barDatasetSpacing       : 1,
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)


    var areaChartData = {
      labels: {!! $users_name !!},
      datasets: [
        {
          label: 'Ordenes de trabajo',
          fillColor           : '#36a2eb',
          strokeColor         : '#36a2eb',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data: {!! $users_quantity !!},
        }
      ]
    }
    var barChartCanvas                   = $('#bar-users').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChart.Bar(barChartData, barChartOptions)

</script>
@endpush
