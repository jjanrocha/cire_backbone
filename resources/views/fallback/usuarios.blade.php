@extends('layouts.basico')
@section('title', 'Usuário não localizado')

@section('content')

@include('layouts.sidebar')

<div class="main" id="pagina">
    <div class="container">

        <div>
            <h4>Usuário não localizado</h4>
            <hr>
        </div>
        
        <p>Usuário não localizado <a href="{{route('usuarios.index')}}">clique aqui</a> para ir à lista de usuários</p>

    </div>
</div>

@include('layouts.footer')

@endsection
