@extends('backend.backend')

@section('title', 'larCMS | Añadir Publicación')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog
                <small>Añadir Publicación</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i>Escritorio</a>
                </li>
                <li><a href="{{ route('backend.blog.index') }}">Blog</a></li>
                <li class="active">Añadir Publicación</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($post, [
                    'method' => 'POST',
                    'route' => 'backend.blog.store',
                    'files' => TRUE,
                    'id' => 'post-form'
                ]) !!}
                @include('backend.blog.form')
                {!! Form::close() !!}
            </div>
    <!-- ./row -->
    </section>
    <!-- /.content -->
    </div>

@endsection
@include('backend.blog.script')
