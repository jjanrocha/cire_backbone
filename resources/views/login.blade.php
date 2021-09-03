@extends('layouts.basico')
@section('title', 'Login')

@section('content')
<div class="background-login">
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
                                <img src="{{ asset('img/logo.png')}}">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="re_usuario" class="col-sm-3 col-form-label">RE:</label>
                                <div class="col-md-7">
                                    <input type="text" name="re_usuario" id="re_usuario" value="{{ old('re_usuario') }}"
                                        class="form-control">
                                    {{ $errors->has('re_usuario') ? $errors->first('re_usuario') : '' }}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="senha" class="col-sm-3 col-form-label">Senha:</label>
                                <div class="col-md-7">
                                    <input type="password" name="password" id="senha" class="form-control">
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

@endsection