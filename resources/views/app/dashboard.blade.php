@extends('layouts.basico')
@section('title', $title)

@section('content')

@include('layouts.sidebar')

<!-- Conteúdo -->
<div class="main" id="pagina">
    <div class="container">

        <h4>Dashboard</h4>
        <hr>

        Página em manutenção. <br><br>

        <div class="row">
            <div class="col-md-4">

                <div class="card bg-light text-dark mb-1">
                    <div class="card-header">
                        Total
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" id="total_atividades">{{$total_atividades}}</h5>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@include('layouts.footer')
@endsection
