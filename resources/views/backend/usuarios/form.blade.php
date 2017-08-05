<div class="col-xs-12">
    <div class="box">
        <!-- /.box-header -->
        <div class="box-body ">

            <!-- TÍTULO -->
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }} ">
                {!! Form::label('nombre','Nombre') !!}
                {!! Form::text('nombre',null, ['class'=>'form-control']) !!}

                @if($errors->has('nombre'))
                    <span class="help-block">{{ $errors->first('nombre') }} </span>
                @endif
            </div>


            <!-- EMAIL -->
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} ">
                {!! Form::label('email','E-mail') !!}
                {!! Form::text('email',null, ['class'=>'form-control']) !!}

                @if($errors->has('email'))
                    <span class="help-block">{{ $errors->first('email') }} </span>
                @endif
            </div>

            <!-- PASSWORD -->
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                {!! Form::label('password') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}

                @if($errors->has('password'))
                    <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                {!! Form::label('password_confirmation') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

                @if($errors->has('password_confirmation'))
                    <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>


        </div>


        <div class="box-footer">
            <button type="submit" class="btn btn-primary">{{ $usuario->exists ? 'Actualiza' : 'Guarda' }}</button>
            <a href="{{ route('backend.usuarios.index') }}" class="btn btn-default">Cancela</a>
        </div>


    </div>
    <!-- /.box -->
</div>