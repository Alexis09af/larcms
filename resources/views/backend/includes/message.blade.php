<!-- Si venimos de crear una publicació -->
<!-- Si venimos de Eliminar una publicació -->
<!-- Si venimos de Editar una publicació -->
@if(session('error-mensaje'))
    <div class="alert alert-error">
        {{ session('error-mensaje') }}
    </div>
@elseif(session('enviado-papelera'))
    <?php list($mensaje,$postId) = session('enviado-papelera') ?>
    {!! Form::open(['method'=>'PUT','route' => ['backend.blog.restore',$postId]]) !!}
        <div class="alert alert-info">
            {{ $mensaje }}
                     <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-undo"></i> Restaura</button>
        </div>
    {!! Form::close() !!}

@elseif(session('mensaje'))
    <div class="alert alert-info">
        {{ session('mensaje') }}
    </div>
@endif