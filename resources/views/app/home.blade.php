@extends('layouts.basico')
@section('title', $title)

@section('content')

@include('layouts.sidebar')

<!-- Conteúdo -->
<div class="main" id="pagina">

    <div class="container">
        <p>Olá, {{Auth::user()->nome}} </p>
    </div>

</div>

@include('layouts.footer')

@endsection
