@extends('layouts.app')

@section('title', 'Inicio de Sesión')

@section('body-class', 'signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="card card-signup">
                        <form class="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            
                            <div class="header header-primary text-center">
                                <h4>Inicio de Sesión</h4>
                                <!--<div class="social-line">
                                    <a href="#pablo" class="btn btn-simple btn-just-icon">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                    <a href="#pablo" class="btn btn-simple btn-just-icon">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#pablo" class="btn btn-simple btn-just-icon">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </div>-->
                            </div>
                            <p class="text-divider">Datos de Acceso</p>
                            <div class="content">

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <!--<input type="text" class="form-control" placeholder="Email..."> -->
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email..." required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña..." required>
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <!-- If you want to add a checkbox to this form, uncomment this code-->

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        Recuerdame
                                    </label>
                                </div> 
                            </div>
                            <div class="footer text-center">
                                 <button class="btn btn-simple btn-primary btn-lg"> Ingresar</button>
                            <!--<a class="btn btn-link" href="{{ route('password.request') }}">
                                ¿Olvidaste tu Contraseña?    
                            </a>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>

			@include('includes.footer')
</div>
@endsection
