@extends('backend.backend')

@section('title', 'larCMS | Añadir Usuario')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Usuarios
                <small>Añadir Usuario</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Escritorio</a>
                </li>
                <li><a href="{{ route('backend.usuarios.index') }}">Usuarios</a></li>
                <li class="active">Añadir Usuario</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($usuario, [
                    'method' => 'POST',
                    'route' => 'backend.usuarios.store',
                    'files' => TRUE,
                    'id' => 'usuario-form'
                ]) !!}
                @include('backend.usuarios.form')
                {!! Form::close() !!}
            </div>
    <!-- ./row -->
    </section>
    <!-- /.content -->
    </div>

@endsection
