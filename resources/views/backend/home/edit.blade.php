@extends('backend.backend')

@section('title', 'larCMS | Editar Cuenta')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Perfil
                <small>Editar Perfil</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Escritorio</a>
                </li>
                <li class="active">Editar Perfil</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                @include('backend.includes.message')
                {!! Form::model($usuario, [
                    'method' => 'PUT',
                    'url' => '/editar-perfil',
                    'id' => 'usuarios-form'
                ]) !!}
                @include('backend.usuarios.form',['escondeRol' => true])
                {!! Form::close() !!}
            </div>
    <!-- ./row -->
    </section>
    <!-- /.content -->
    </div>

@endsection

