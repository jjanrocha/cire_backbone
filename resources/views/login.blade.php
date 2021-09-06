@extends('layouts.basico')
@section('title', 'Login')

@section('content')
<div class="background-gray90">
    <div class="container d-flex h-100">
        <div class="row justify-content-center row align-self-center w-100">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4 align-self-end" style="font-weight: bold">
                                Login
                            </div>
                            <div class="col-4 d-flex justify-content-center">
                                <img src="{{ asset('img/logo.png')}}" height="88" width="84">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="id" class="col-sm-3 col-form-label">RE:</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" name="id" id="id" value="{{ old('id') }}"
                                            class="form-control @if($errors->has('id')) is-invalid @endif">
                                    </div>
                                    {{ $errors->has('id') ? $errors->first('id') : '' }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="senha" class="col-sm-3 col-form-label">Senha:</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input type="password" name="password" id="senha"
                                            class="form-control @if($errors->has('password')) is-invalid @endif">
                                    </div>
                                    {{ $errors->has('password') ? $errors->first('password') : '' }}
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-5">
                                    <button type="submit" class="btn btn-secondary">
                                        Entrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    html {
        height: 100%;
    }
    </style>
@endsection