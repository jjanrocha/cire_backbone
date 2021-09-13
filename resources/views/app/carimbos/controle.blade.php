@extends('layouts.basico')
@section('title', $title)

@section('content')

@include('layouts.sidebar')

<!-- Conteúdo -->
<div class="main" id="pagina">
    <div class="container">


        <div>
            <h4>Controle</h4>
            <hr>
        </div>

        <div class="row">
            <div class="col-md-12">
                @foreach ( $lista_carimbos_controle as $option )
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tipo_atividade_id" id="{{str_replace(' ', '_', $option['tipo_carimbo'])}}" value="{{ $option['id'] }}">
                    <label class="form-check-label" for="{{str_replace(' ', '_', $option['tipo_carimbo'])}}">
                        {{ $option['tipo_carimbo'] }}
                    </label>
                </div>
                @endforeach
            </div>
        </div>


    </div>
</div>

@include('layouts.footer')

<script>
    $(document).on('click', '#ESCALONAMENTO_CRISE', function () {
        //alert('teste')
    })

</script>
@endsection
