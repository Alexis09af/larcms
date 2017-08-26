@extends('backend.backend')

@section('title', 'larCMS | Usuarios')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Usuarios
                <small>Muestra los Usuarios</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i>Escritorio</a>
                </li>
                <li><a href="{{ route('backend.usuarios.index') }}">Usuarios</a></li>
                <li class="active">Todos los Usuarios</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header clearfix">
                            <div class=pull-left">
                                <a href="{{ route('backend.usuarios.create') }}" class="btn btn-info">Añadir Usuario</a>
                            </div>
                            <div class="pull-right">
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                        @include('backend.includes.message')

                        <!-- Si no hay publicaciones -->

                            @if (! $usuarios->count())
                                <div class="alert alert-info">
                                    <strong>No hay Usuarios.</strong>
                                </div>
                            @else
                                    @include('backend.usuarios.table')
                            @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="pull-left">
                                {{ $usuarios->render() }}
                            </div>
                            <div class="pull-right ">
                                <p><small class="float-right">Usuarios: {{$totalUsuarios}}</small></p>
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