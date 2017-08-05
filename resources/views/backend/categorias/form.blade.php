<div class="col-xs-12">
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


        </div>


        <div class="box-footer">
            <button type="submit" class="btn btn-primary">{{ $categoria->exists ? 'Actualiza' : 'Guarda' }}</button>
            <a href="{{ route('backend.categorias.index') }}" class="btn btn-default">Cancela</a>
        </div>


    </div>
    <!-- /.box -->
</div>