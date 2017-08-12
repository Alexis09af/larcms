<?php /* @todo arreglar que un usuario con rol autor no puede modificar sus post */ ?>
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
    <?php $request = request(); ?>
    @foreach($posts as $post)

        <tr>
            <td>
                {!! Form::open(['method' => 'DELETE', 'route' => ['backend.blog.destroy',$post->id]]) !!}

                @if (check_user_permissions($request, "Blog@edit", $post->id))
                    <a href="{{ route('backend.blog.edit', $post->id) }}" class="btn btn-xs btn-default">
                        <i class="fa fa-edit"></i>
                    </a>
                @else
                    <a href="#" class="btn btn-xs btn-default disabled">
                        <i class="fa fa-edit"></i>
                    </a>
                @endif

                @if (check_user_permissions($request, "Blog@destroy", $post->id))
                    <button type="submit" class="btn btn-xs btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                @else
                    <button type="button" onclick="return false;" class="btn btn-xs btn-danger disabled">
                        <i class="fa fa-trash"></i>
                    </button>
                @endif
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