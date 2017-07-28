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
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body ">
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
                                          <?php /*<abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr> |
                                          {!! $post->publicationLabel() !!} */ ?>
                                      </td>
                                  </tr>

                              @endforeach
                              </tbody>
                          </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="pull-left">
                                <?php /*{{ $posts->render() }}*/?>
                            </div>
                            <div class="pull-right">
                                <?php $postCount = $posts->count() ?>
                                <small>{{ $postCount }} {{ str_plural('Item', $postCount) }}</small>
                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>

@endsection
