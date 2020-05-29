@extends('layouts.master')

@section('content')
@if(session('message'))
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="alert alert-{{ session('message')[0] }}">
                            <h4 class="alert-heading">
                                {{ __("Mensaje Informativo") }}</h4>
                                <p>{{ session('message')[1] }}</p>
                            </h4>
                        </div>
                    </div>
                </div>
            @endif
<div class="container">
<<<<<<< HEAD
    <div class="row justify-content-between">
        <div class="col-md-7">
=======
    <div class="row justify-content-center">
        <div class="col-md-8" style="padding: 5em 0px">
>>>>>>> allmarket_alexis_definitiveBranch
            <div class="card">
                <div class="card-header">{{ __( trans('idioma.login') ) }}</div>
                <!-- <h2 id="contact">INICIO SESIÓN</h2> -->
                <div align="center" class="star-navy">
                    <i class="fa fa-star"></i>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __( trans('idioma.loguinPassword') ) }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __( trans('idioma.loguinRemember') ) }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __( trans('idioma.loguinSignIn') ) }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __( trans('idioma.loguinForgotPassword') ) }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<<<<<<< HEAD
        @include("includes.auth.social_login")
=======
        <!-- @include("includes.logueoRedes") -->
>>>>>>> allmarket_alexis_definitiveBranch
    </div>
</div>
@endsection