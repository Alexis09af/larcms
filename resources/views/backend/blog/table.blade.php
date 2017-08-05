<table class="table table-bordered">
    <thead>
    <tr>
        <td width="80">Acción</td>
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
                {!! Form::open(['method' => 'DELETE', 'route' => ['backend.blog.destroy',$post->id]]) !!}
                <a href="{{ route('backend.blog.edit', $post->id) }}" class="btn btn-xs btn-default">
                    <i class="fa fa-edit"></i>
                </a>
                <button type="submit" class="btn btn-xs btn-danger">
                    <i class="fa fa-trash"></i>
                </button>
                {!! Form::close() !!}
            </td>
            <td>{{ $post->titulo }}</td>
            <td>{{ $post->autor->nombre }}</td>
            <td>{{ $post->categoria->titulo }}</td>
            <td>
                <abbr title="{{ $post->fechaFormatoES(true) }}">{{ $post->fechaFormatoES() }}</abbr> |
                {!! $post->publicationLabel() !!}
            </td>
        </tr>

    @endforeach
    </tbody>
</table>