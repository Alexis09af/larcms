@extends('backend.backend')

@section('title', 'larCMS | Editar Usuario')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Usuarios
                <small>Editar Usuario</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i>Escritorio</a>
                </li>
                <li><a href="{{ route('backend.usuarios.index') }}">Usuarios</a></li>
                <li class="active">Editar Usuario</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($usuario, [
                    'method' => 'PUT',
                    'route' => ['backend.usuarios.update',$usuario->id],
                    'files' => TRUE,
                    'id' => 'usuarios-form'
                ]) !!}
                @include('backend.usuarios.form')
                {!! Form::close() !!}
            </div>
    <!-- ./row -->
    </section>
    <!-- /.content -->
    </div>

@endsection

