@if (isset($categoriaNombre))
    <div class="alert alert-info">
        <p>Categoria: <strong>{{$categoriaNombre}}</strong></p>
    </div>
@endif
@if (isset($autorNombre))
    <div class="alert alert-info">
        <p>Autor: <strong>{{$autorNombre}}</strong></p>
    </div>
@endif
@if ($search = request('search'))
    <div class="alert alert-info">
        <p>Resultados de busqueda: <strong>{{$search}}</strong></p>
    </div>
@endif
