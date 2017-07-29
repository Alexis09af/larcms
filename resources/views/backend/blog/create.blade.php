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
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Escritorio</a>
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
                <div class="col-xs-9">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body ">





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

                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                 <div class="col-xs-3">
                     <div class="box">
                         <div class="box-header with-border">
                            <h3 class="box-title">Publicar</h3>
                         </div>
                         <div class="box-body">
                             <!-- FECHA PUBLICACIÓN -->
                             <div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">
                                 {!! Form::label('published_at','Fecha Publicación') !!}
                                 <div class="form-group">
                                     <div class='input-group date' id='datetimepicker1'>
                                         {!! Form::text('published_at',null, ['class'=>'form-control','placeholder'=>'Y-m-d H:m:s']) !!}
                                         <span class="input-group-addon">
                                             <span class="glyphicon glyphicon-calendar"></span>
                                         </span>
                                     </div>
                                 </div>
                                 @if($errors->has('published_at'))
                                     <span class="help-block">{{ $errors->first('published_at') }} </span>
                                 @endif
                             </div>
                         </div>
                         <div class="box-footer clearfix">
                             <div class="pull-left">
                                 <a id="draft-btn"  class="btn btn-default">Solo gúardar</a>
                             </div>
                             <div class="pull-right">
                                 {!! Form::submit('Publicar',['class'=>'btn btn-primary']) !!}
                             </div>
                         </div>
                     </div>
                     <div class="box">
                         <div class="box-header with-border">
                             <h3 class="box-title">Categoria</h3>
                         </div>
                         <div class="box-body text-center">

                             <!-- CATEGORIA -->
                             <div class="form-group {{ $errors->has('categoria_id') ? 'has-error' : '' }}">
                                 {!! Form::select('categoria_id',App\lc_categoria::pluck('titulo','id'),null, ['class'=>'form-control','placeholder'=>'Categoria']) !!}

                                 @if($errors->has('categoria_id'))
                                     <span class="help-block">{{ $errors->first('categoria_id') }} </span>
                                 @endif
                             </div>
                         </div>
                     </div>
                     <div class="box">
                         <div class="box-header with-border">
                             <h3 class="box-title">Imagen</h3>
                         </div>
                         <div class="box-body text-center">

                             <!-- IMAGEN -->
                             <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">


                                 <div class="fileinput fileinput-new" data-provides="fileinput">
                                     <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                         <img src="http://placehold.it/200x150$text=No+Image" alt="...">
                                     </div>
                                     <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                     <div>
                                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                                        {!! Form::file('image') !!}
                                    </span>
                                         <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                     </div>
                                 </div>


                                 @if($errors->has('image'))
                                     <span class="help-block">{{ $errors->first('image') }} </span>
                                 @endif
                             </div>
                         </div>
                     </div>

                 </div>
                {!! Form::close() !!}
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

        //Añade el editor SimpleMde a el excerpt y a la descripción
        var simplemde1 = new SimpleMDE({ element: $("#excerpt")[0] });
        var simplemde2 = new SimpleMDE({ element: $("#body")[0] });

        $('#datetimepicker1').datetimepicker(
            {
                format: 'YYYY-MM-DD HH:mm:ss',
                showClear: true
            }
        );

        $('#draft-btn').click(function(e){
            e.preventDefault();
            $('#published_at').val("");
            $('#post-form').submit();
        });


    </script>
@endsection