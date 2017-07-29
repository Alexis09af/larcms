@extends('backend.backend')

@section('title', 'MyBlog | Añadir Publicación')

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
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a>
                </li>
                <li><a href="{{ route('backend.blog.index') }}">Blog</a></li>
                <li class="active">Añadir Publicación</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body ">
                            {!! Form::model($post, [
                                'method' => 'POST',
                                'route' => 'backend.blog.store',
                                'files' => TRUE
                            ]) !!}

                            <!-- IMAGEN -->
                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                {!! Form::label('Imagen') !!}
                                {!! Form::file('image') !!}

                                @if($errors->has('image'))
                                    <span class="help-block">{{ $errors->first('image') }} </span>
                                @endif
                            </div>


                            <!-- TÍTULO -->
                            <div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }} ">
                                {!! Form::label('titulo','Título') !!}
                                {!! Form::text('titulo',null, ['class'=>'form-control']) !!}

                                @if($errors->has('titulo'))
                                    <span class="help-block">{{ $errors->first('titulo') }} </span>
                                @endif
                            </div>


                            <!-- SLUG -->
                            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }} ">
                                {!! Form::label('slug','Slug') !!}
                                {!! Form::text('slug',null, ['class'=>'form-control']) !!}

                                @if($errors->has('slug'))
                                    <span class="help-block">{{ $errors->first('slug') }} </span>
                                @endif
                            </div>


                            <!-- CATEGORIA -->
                            <div class="form-group {{ $errors->has('categoria_id') ? 'has-error' : '' }}">
                                {!! Form::label('categoria','Categoria') !!}
                                {!! Form::select('categoria_id',App\lc_categoria::pluck('titulo','id'),null, ['class'=>'form-control','placeholder'=>'Categoria']) !!}

                                @if($errors->has('categoria_id'))
                                    <span class="help-block">{{ $errors->first('categoria_id') }} </span>
                                @endif
                            </div>


                            <!-- EXCERPT -->
                            <div class="form-group excerpt">
                                {!! Form::label('excerpt','Excerpt') !!}
                                {!! Form::textarea('excerpt',null, ['class'=>'form-control']) !!}
                            </div>


                            <!-- DESCRIPCIÓN -->
                            <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                                {!! Form::label('body','Descripción') !!}
                                {!! Form::textarea('body',null, ['class'=>'form-control']) !!}

                                @if($errors->has('body'))
                                    <span class="help-block">{{ $errors->first('body') }} </span>
                                @endif
                            </div>


                            <!-- FECHA PUBLICACIÓN -->
                            <div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">
                                {!! Form::label('published_at','Fecha Publicación') !!}
                                {!! Form::text('published_at',null, ['class'=>'form-control','placeholder'=>'Y-m-d H:m:s']) !!}

                                @if($errors->has('published_at'))
                                    <span class="help-block">{{ $errors->first('published_at') }} </span>
                                @endif
                            </div>




                            {!! Form::submit('Confirma la publicación',['class'=>'btn btn-primary']) !!}
                            {!! Form::close() !!}
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
        //Añadimos clases al pagination del backend del blog
        $('ul.pagination').addClass('no-margin pagination-sm');

        $('#titulo').on('blur',function(){
            var tituloConvertido = this.value.toLowerCase().trim();
                slugInput = $('#slug');

            tituloConvertido = tituloConvertido.replace(/&/g, '-y-')
                .replace(/[^a-z0-9-]+/g, '-')
                .replace(/\-\-+/g, '-')
                .replace(/^-+|-+$/g, '');

                slugInput.val(tituloConvertido);
        });

        var simplemde1 = new SimpleMDE({ element: $("#excerpt")[0] });

        var simplemde2 = new SimpleMDE({ element: $("#body")[0] });


    </script>
@endsection