<div class="col-xs-12">
    <div class="box">
        <!-- /.box-header -->
        <div class="box-body ">

            <!-- NOMBRE -->
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }} ">
                {!! Form::label('nombre','Nombre') !!}
                {!! Form::text('nombre',null, ['class'=>'form-control']) !!}

                @if($errors->has('nombre'))
                    <span class="help-block">{{ $errors->first('nombre') }} </span>
                @endif
            </div>

            <!-- SLUG -->
            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }} ">
                {!! Form::label('Slug') !!}
                {!! Form::text('slug',null, ['class'=>'form-control']) !!}

                @if($errors->has('slug'))
                    <span class="help-block">{{ $errors->first('slug') }} </span>
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

            <!-- BIOGRAFÍA -->
            <div class="form-group ">
                {!! Form::label('Biografía') !!}
                {!! Form::textarea('biografia',null, ['rows' => 5,'class'=>'form-control']) !!}

                @if($errors->has('biografia'))
                    <span class="help-block">{{ $errors->first('biografia') }} </span>
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
            <!-- PASSWORD CONFIRMATION-->
            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                {!! Form::label('password_confirmation') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}

                @if($errors->has('password_confirmation'))
                    <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>

            <!-- ROLE  -->
            <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                {!! Form::label('Rol') !!}

                @if ($usuario->exists && ($usuario->id == config('cms.default_usuario_id') || isset($escondeRol)))
                    {!! Form::hidden('role',$usuario->roles->first()->id) !!}

                    <p class=form-control-static">{{ $usuario->roles->first()->display_name }}</p>
                @else
                    {!! Form::select('role',App\Role::pluck('display_name','id') ,$usuario->exists ? $usuario->roles->first()->id : null, ['class' => 'form-control', 'placeholder' => 'Roles']) !!}

                    @if($errors->has('role'))
                        <span class="help-block">{{ $errors->first('role') }}</span>
                    @endif
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