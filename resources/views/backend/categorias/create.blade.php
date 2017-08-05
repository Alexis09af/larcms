@extends('backend.backend')

@section('title', 'larCMS | Añadir Cateoría')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog
                <small>Añadir Categoría</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Escritorio</a>
                </li>
                <li><a href="{{ route('backend.categorias.index') }}">Blog</a></li>
                <li class="active">Añadir Categoría</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($categoria, [
                    'method' => 'POST',
                    'route' => 'backend.categorias.store',
                    'files' => TRUE,
                    'id' => 'categoria-form'
                ]) !!}
                @include('backend.categorias.form')
                {!! Form::close() !!}
            </div>
    <!-- ./row -->
    </section>
    <!-- /.content -->
    </div>

@endsection
@include('backend.categorias.script')
