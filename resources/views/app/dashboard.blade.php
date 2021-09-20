@extends('layouts.basico')
@section('title', $title)

@section('content')

@include('layouts.sidebar')

<!-- Conteúdo -->
<div class="main" id="pagina">
    <div class="container">

        <h4>Dashboard</h4>
        <hr>
        
        <div class="row">
          <div class="col-12">
            <div id="piechart"></div>
          </div>
        </div>


    </div>
</div>

@include('layouts.footer')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Tipo de atividade', 'Total'],
        ['Escalonamento Crise', {{$total_escalonamento_crise}}]
      ]);

      var options = {
        title: 'Atividades'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }

    $(window).resize(function(){
      drawChart();
    });

  </script>

@endsection