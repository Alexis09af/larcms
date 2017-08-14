@extends('backend.backend')

@section('title', 'larCMS | Editar Categoría')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog
                <small>Editar Categoriía</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i>Escritorio</a>
                </li>
                <li><a href="{{ route('backend.categorias.index') }}">Blog</a></li>
                <li class="active">Editar Categoría</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($categoria, [
                    'method' => 'PUT',
                    'route' => ['backend.categorias.update',$categoria->id],
                    'files' => TRUE,
                    'id' => 'post-form'
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
