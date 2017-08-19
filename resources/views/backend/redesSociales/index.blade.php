@extends('backend.backend')

@section('title', 'larCMS | Redes Sociales')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Redes Sociales
                <small>Escoge las redes sociales</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a>
                </li>
                <li class="active"><a href="{{ route('backend.categorias.index') }}">Redes Sociales</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        <div class="box-body ">
                            @include('backend.includes.message')

                            {!! Form::model($redes, [
                                'method' => 'PUT',
                                'route' => ['backend.redes-sociales.update',$redes->id],
                                'id' => 'redes-form'
                            ]) !!}

                            <div class="form-group">
                                {!! Form::label('facebook') !!}
                                {!! Form::text('fbLink',null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('twitter') !!}
                                {!! Form::text('twtLink',null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('google','Google Plus') !!}
                                {!! Form::text('gpLink',null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('instagram') !!}
                                {!! Form::text('instaLink',null, ['class'=>'form-control']) !!}
                            </div>


                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Guarda</button>
                                <a href="{{ route('backend.redes-sociales.index') }}" class="btn btn-default">Cancela</a>
                            </div>


                            {{ Form::close() }}
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
