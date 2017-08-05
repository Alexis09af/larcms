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
                {!! Form::open(['style' => 'display:inline-block;' , 'method' => 'PUT', 'route' => ['backend.blog.restore',$post->id]]) !!}
                <button title="Restore" class="btn btn-xs btn-default">
                    <i class="fa fa-refresh"></i>
                </button>
                {!! Form::close() !!}

                {!! Form::open(['style' => 'display:inline-block;' , 'method' => 'DELETE', 'route' => ['backend.blog.force-destroy',$post->id]]) !!}
                <button title="Delete Permanent" onclick="return confirm('Vas a eliminar la publicación, estás seguro?')" type="submit" class="btn btn-xs btn-danger">
                    <i class="fa fa-times"></i>
                </button>
                {!! Form::close() !!}
            </td>
            <td>{{ $post->titulo }}</td>
            <td>{{ $post->autor->nombre }}</td>
            <td>{{ $post->categoria->titulo }}</td>
            <td>
                <abbr title="{{ $post->fechaFormatoES(true) }}">{{ $post->fechaFormatoES() }}</abbr> |
            </td>
        </tr>

    @endforeach
    </tbody>
</table>