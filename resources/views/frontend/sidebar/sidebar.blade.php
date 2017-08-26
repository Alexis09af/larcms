<div class="col-md-4">
    <aside class="right-sidebar">

        <!-- Formulario de busqueda -->
        <div class="search-widget">
            <form action=""{{ route('blog') }}>
            <div class="input-group">
              <input type="text" class="form-control input-lg" value="{{ request('search') }}" name="search" placeholder="¿Que estás buscando?">
              <span class="input-group-btn">
                <button class="btn btn-lg btn-default" type="submit">
                    <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
            </form>
        </div>


        <div class="widget">
            <div class="widget-heading">
                <h4>Categorías</h4>
            </div>
            <div class="widget-body">
                <ul class="categories">
                    @foreach($categorias as $categoria)
                        <li>
                            <a href="{{ route('categoria',$categoria->slug) }}"><i class="fa fa-angle-right"></i> {{ $categoria->titulo }}</a>
                            <span class="badge pull-right">{{ $categoria->posts->count() }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


        <!-- Widget Publicaciones Populares -->
        <div class="widget">
            <div class="widget-heading">
                <h4>Lo Mas Popular!</h4>
            </div>
            <div class="widget-body">
                <ul class="popular-posts">
                    @foreach ($postsPopulares as $popular)
                    <li>
                        <div class="post-image">
                            <a href="{{ route('muestraPost', $popular->slug) }}">
                                @if ($popular->image_thumb_url)
                                    <img src="{{ $popular->image_thumb_url }}" alt="">
                                @endif
                            </a>
                        </div>
                        <div class="post-body">
                            <h6><a href="{{ route('muestraPost', $popular->slug) }}">{{ $popular->titulo }}</a></h6>
                            <div class="post-meta">
                                <span>{{ $popular->fechaPublicacion }}</span>
                            </div>
                        </div>
                    </li>
                        @endforeach
                </ul>
            </div>
        </div>


        <!-- Widget Histórico por fecha -->
        <div class="widget">
            <div class="widget-heading">
                <h4>Archivos</h4>
            </div>
            <div class="widget-body">
                <ul class="categories">
                    @foreach($archives as $archive)
                        <li>
                            @if($archive->month=='enero')<?php $mes = 'january' ; ?>
                            @elseif ($archive->month=='febrero')<?php $mes = 'february' ; ?>
                            @elseif ($archive->month=='marzo')<?php $mes = 'march' ; ?>
                            @elseif ($archive->month=='abril')<?php $mes = 'april' ; ?>
                            @elseif ($archive->month=='mayo')<?php $mes = 'may' ; ?>
                            @elseif ($archive->month=='junio')<?php $mes = 'june' ; ?>
                            @elseif ($archive->month=='julio')<?php $mes = 'july' ; ?>
                            @elseif ($archive->month=='agosto')<?php $mes = 'august' ; ?>
                            @elseif ($archive->month=='septiembre')<?php $mes = 'september' ; ?>
                            @elseif ($archive->month=='octubre')<?php $mes = 'october' ; ?>
                            @elseif ($archive->month=='noviembre')<?php $mes = 'november' ; ?>
                            @elseif ($archive->month=='diciembre')<?php $mes = 'december' ; ?>
                            @endif
                            <a href="{{ route('blog', ['month' => $mes, 'year' => $archive->year]) }}">{{ $archive->month . " " . $archive->year }}</a>
                            <span class="badge pull-right">{{ $archive->post_count }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


    </aside>
</div>