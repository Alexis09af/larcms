<table class="table table-bordered">
    <thead>
    <tr>
        <td width="80">Acción</td>
        <td>Nombre</td>
        <td>Email</td>
        <td>Rol</td>
    </tr>
    </thead>
    <tbody>
    <?php $currentUser = auth()->user(); ?>
    @foreach($usuarios as $usuario)

        <tr>
            <td>



                <a href="{{ route('backend.usuarios.edit', $usuario->id) }}" class="btn btn-xs btn-default">
                    <i class="fa fa-edit"></i>
                </a>

                @if($usuario->id == config('cms.default_usuario_id') || $usuario->id == $currentUser->id)
                    <button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled">
                        <i class="fa fa-times"></i>
                    </button>
                @else
                    <a href="{{ route('backend.usuarios.confirmar', $usuario->id) }}" class="btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>
                    </a>
                 @endif






            </td>
            <td>{{ $usuario->nombre }}</td>
            <td>{{ $usuario->email }}</td>
            <td>{{ $usuario->roles->first()->display_name }}</td>

        </tr>

    @endforeach
    </tbody>
</table>