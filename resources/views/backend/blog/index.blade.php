@extends('backend.backend')

@section('title', 'MyBlog | Blog Index')

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

                        <div class="box-header">
                            <div class=pull-left">
                                <a href="{{ route('backend.blog.create') }}" class="btn btn-info">Crea una publicación</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                            <!-- Si venimos de crear una publicació -->
                            @if(session('creado'))
                                <div class="alert alert-success">
                                    {{ session('creado') }}
                                </div>
                            @endif
                            <!-- Si no hay publicaciones -->
                            @if (!$posts->count())
                            <div class="alert alert-info">
                                <strong>No hay publicaciones.</strong>
                            </div>
                            @else
                              <table class="table table-bordered">
                                  <thead>
                                      <tr>
                                          <td width="80">Action</td>
                                          <td>Titulo</td>
                                          <td width="120">Autor</td>
                                          <td width="150">Categoria</td>
                                          <td width="170">Fecha</td>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($posts as $post)

                                      <tr>
                                          <td>
                                              <a href="{{ route('backend.blog.edit', $post->id) }}" class="btn btn-xs btn-default">
                                                  <i class="fa fa-edit"></i>
                                              </a>
                                              <a href="{{ route('backend.blog.destroy', $post->id) }}" class="btn btn-xs btn-danger">
                                                  <i class="fa fa-times"></i>
                                              </a>
                                          </td>
                                          <td>{{ $post->titulo }}</td>
                                          <td>{{ $post->autor->nombre }}</td>
                                          <td>{{ $post->categoria->titulo }}</td>
                                          <td>
                                              <abbr title="{{ $post->fechaFormatoES(true) }}">{{ $post->fechaFormatoES() }}</abbr> |
                                              {!! $post->publicationLabel() !!}
                                          </td>
                                      </tr>

                                  @endforeach
                                  </tbody>
                              </table>
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