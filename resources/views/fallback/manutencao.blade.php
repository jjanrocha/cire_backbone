@extends('layouts.basico')
@section('title', 'Página em manutenção')

@section('content')

@include('layouts.sidebar')

<div class="main" id="pagina">
    <div class="container">

        <div>
            <h4>Página em manutenção</h4>
            <hr>
        </div>
        
        <p><a href="{{route('index')}}">Clique aqui</a> para retornar à página inicial.</p>

    </div>
</div>

@include('layouts.footer')

@endsection