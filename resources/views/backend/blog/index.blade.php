@extends('backend.backend')

@section('title', 'larCMS | Blog Index')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog
                <small>Muestra las publicaciones</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a>
                </li>
                <li><a href="{{ route('backend.blog.index') }}">Blog</a></li>
                <li class="active">Todas las publicaciones</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header clearfix">
                            <div class=pull-left">
                                <a href="{{ route('backend.blog.create') }}" class="btn btn-info">Crea una publicación</a>
                            </div>
                            <div class="pull-right todas_papelera">
                                <a href="?status=todas">Todas</a> |
                                <a href="?status=propios">Propios</a> |
                                <a href="?status=papelera">Papelera</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                        @include('backend.includes.message')

                        <!-- Si no hay publicaciones -->

                            @if (! $posts->count())
                                <div class="alert alert-info">
                                    <strong>No hay publicaciones.</strong>
                                </div>
                            @else
                                @if($onlyTrashed)
                                    @include('backend.blog.table-trash')
                                @else
                                    @include('backend.blog.table')
                                @endif
                            @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="pull-left">
                                {{ $posts->render() }}
                            </div>
                            <div class="pull-right ">
                                <?php $postCount = $posts->count() ?>
                                <p><small class="float-right">Mostrando: {{$postCount}}</small></p>
                                <p><small class="float-right">Total: {{$postsTotales}}</small></p>
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