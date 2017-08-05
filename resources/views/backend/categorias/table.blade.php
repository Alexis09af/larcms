<table class="table table-bordered">
    <thead>
    <tr>
        <td width="80">Acción</td>
        <td>Categoria</td>
        <td width="120">Publicaciones</td>
    </tr>
    </thead>
    <tbody>
    @foreach($categorias as $categoria)

        <tr>
            <td>
                {!! Form::open(['method' => 'DELETE', 'route' => ['backend.categorias.destroy',$categoria->id]]) !!}
                <a href="{{ route('backend.categorias.edit', $categoria->id) }}" class="btn btn-xs btn-default">
                    <i class="fa fa-edit"></i>
                </a>

                @if($categoria->id == config('cms.default_categoria_id'))
                    <button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled">
                        <i class="fa fa-times"></i>
                    </button>
                @else
                    <button onclick="return confirm('Vas a eliminar la categoría, estás seguro?');" type="submit" class="btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>
                    </button>
                 @endif





                {!! Form::close() !!}
            </td>
            <td>{{ $categoria->titulo }}</td>
            <td>{{ $categoria->posts->count() }}</td>

        </tr>

    @endforeach
    </tbody>
</table>