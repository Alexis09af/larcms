@extends('backend.backend')

@section('title', 'larCMS | Categorias')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Categorias
                <small>Muestra las categorias</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a>
                </li>
                <li><a href="{{ route('backend.categorias.index') }}">Categorias</a></li>
                <li class="active">Todas las categorias</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header clearfix">
                            <div class=pull-left">
                                <a href="{{ route('backend.categorias.create') }}" class="btn btn-info">Crea una categoría</a>
                            </div>
                            <div class="pull-right">
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                        @include('backend.includes.message')

                        <!-- Si no hay publicaciones -->

                            @if (! $categorias->count())
                                <div class="alert alert-info">
                                    <strong>No hay categorias.</strong>
                                </div>
                            @else
                                    @include('backend.categorias.table')
                            @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="pull-left">
                                {{ $categorias->render() }}
                            </div>
                            <div class="pull-right ">
                                <p><small class="float-right">Categorias: {{$totalCategorias}}</small></p>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.box -->
            </div>


            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');
    </script>
@endsection