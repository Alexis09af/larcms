@extends('layouts.app')

@section('content')

    <div class="login-box">
        <div class="login-logo">
            <img src="/img/logo.png">
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Iniciar Sesión</p>

            <form method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                    <span class="fa fa-envelope form-control-feedback"></span>

                    @if ($errors->has('email'))
                        <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                    <input type="password" class="form-control" placeholder="Contraseña" name="password">
                    <span class="fa fa-lock form-control-feedback"></span>

                    @if ($errors->has('password'))
                        <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> Remember me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Siguiente</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <br>
            <a href="{{ url('/password/reset') }}">¿Has olvidado tu correo electrónico?</a><br>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

@endsection
