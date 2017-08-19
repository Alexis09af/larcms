@extends('backend.backend')

@section('title', 'larCMS | Escritorio')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Escritorio
            </h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Escritorio</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body ">
                            <h3>larCMS</h3>
                            <p class="lead text-muted">Bienvenido {{ Auth::user()->nombre }}</p>

                            <h4>Empecemos</h4>
                            <p><a href="{{ route('backend.blog.create') }}" class="btn btn-primary">Escribe una publicación</a> </p>
                            <p> <a href="{{ url('/editar-perfil') }}" class="btn btn-primary ">Modifica tu perfil</a> </p>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>

@endsection
