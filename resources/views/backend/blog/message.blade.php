<!-- Si venimos de crear una publicació -->
<!-- Si venimos de Eliminar una publicació -->
<!-- Si venimos de Editar una publicació -->
@if(session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@elseif(session('enviado-papelera'))
    <?php list($mensaje,$postId) = session('enviado-papelera') ?>
    {!! Form::open(['method'=>'PUT','route' => ['backend.blog.restore',$postId]]) !!}
        <div class="alert alert-info">
            {{ $mensaje }}
                     <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-undo"></i> Restaura</button>
        </div>
    {!! Form::close() !!}
@endif