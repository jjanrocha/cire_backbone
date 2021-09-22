@extends('layouts.basico')
@section('title', $title)

@section('content')

@include('layouts.sidebar')

<!-- Conteúdo -->
<div class="main" id="pagina">
    <div class="container">

        <h4>Dashboard</h4>
        <hr>
        
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="dashboard_geral-tab" data-toggle="tab" href="#dashboard_geral" role="tab" aria-controls="dashboard_geral" aria-selected="true">Geral</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="dashboard_operacao-tab" data-toggle="tab" href="#dashboard_operacao" role="tab" aria-controls="dashboard_operacao" aria-selected="false">Operação</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="dashboard_analistas-tab" data-toggle="tab" href="#dashboard_analistas" role="tab" aria-controls="dashboard_analistas" aria-selected="false">Analistas</a>
            </li>
        </ul>

        <div class="tab-content">

            <div class="tab-pane active" id="dashboard_geral" role="tabpanel" aria-labelledby="dashboard_geral-tab">
                <p class="mt-1">Página em manutenção</p>
                <p class="mt-1">Total de registros: {{$total_atividades}}</p>
                <div id="piechart" style="height:350px"></div>
            </div>

            <div class="tab-pane" id="dashboard_operacao" role="tabpanel" aria-labelledby="dashboard_operacao-tab">
                <p class="mt-1">Página em manutenção</p>
            </div>

            <div class="tab-pane" id="dashboard_analistas" role="tabpanel" aria-labelledby="dashboard_analistas-tab">
                <p class="mt-1">Página em manutenção</p>
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
        ['Escalonamento Crise', {{$total_escalonamento_crise}}],
        ['Escalonamento Urgente', {{$total_escalonamento_urgente}}],
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