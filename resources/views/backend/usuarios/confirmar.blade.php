@extends('backend.backend')

@section('title', 'larCMS | Añadir Usuario')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Usuarios
                <small>Confirmación eliminar</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Escritorio</a>
                </li>
                <li><a href="{{ route('backend.usuarios.index') }}">Usuarios</a></li>
                <li class="active">Elimina Usuario</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($usuario, [
                    'method' => 'DELETE',
                    'route' => ['backend.usuarios.destroy',$usuario->id],
                ]) !!}


                <div class="col-xs-9">
                    <div class="box">
                        <div class="box-body ">

                            <p>
                                Vas a dar de baja el usuario: <strong> {{ $usuario->nombre }}</strong>
                            </p>
                            <p>
                                Que se va a hacer con su contenido?
                            </p>
                            <p>
                                <input type="radio" name="delete_option" value="delete" checked> Elimina todas sus publicaciones.
                            </p>

                            <p>
                                <input type="radio" name="delete_option" value="attribute"> Migrar publicaciones a usuario:
                                {!! Form::select('selected_user', $usuarios, null) !!}
                            </p>



                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-danger">Eliminar definitivamente</button>
                            <a href="{{ route('backend.usuarios.index') }}" class="btn btn-default">Cancelar</a>
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
