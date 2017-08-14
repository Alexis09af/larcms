@extends('frontend.includes.header_footer')

@section('contenido')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                    @if (!$posts->count())
                        <div class="alert alert-warning">
                            <p>No hay publicaciones</p>
                        </div>
                    @else
                <!-- Incluimos los mensajes que pueden aparecer en la cabecera de nustro blog.-->
                @include('frontend.includes.alert')


                    @foreach($posts as $post)
                        <article class="post-item">
                            @if ($post->image)
                                <div class="post-item-image">
                                    <a href="{{ route('muestraPost', $post->slug) }}">
                                        <img src="{{ $post->image_url }}" alt="">
                                    </a>
                                </div>
                            @endif
                            <div class="post-item-body">
                                <div class="padding-10">
                                    <h2><a href="{{route('muestraPost',$post->slug)}}">{{ $post->titulo }}</a></h2>
                                    <p>{!! $post->excerpt_html !!}</p>
                                </div>

                                <div class="post-meta padding-10 clearfix">
                                    <div class="pull-left">
                                        <ul class="post-meta-group">
                                            <li><i class="fa fa-user"></i><a href="{{ route('autor',$post->autor->slug) }}"> {{ $post->autor->nombre }}</a></li>
                                            <li><i class="fa fa-clock-o"></i><time> {{$post->fechaPublicacion}}</time></li>
                                            <li><i class="fa fa-folder"></i><a href="{{ route('categoria', $post->categoria->slug) }}"> {{ $post->categoria->titulo }}</a></li>
                                            <li><i class="fa fa-comments"></i><a href="#">4 comentarios</a></li>
                                        </ul>
                                    </div>
                                    <div class="pull-right">
                                        <a href=" {{ route('muestraPost',$post->slug) }} ">Continue Reading &raquo;</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                @endif



                <nav>
                    {{$posts->appends(request()->only(['search']))->links()}}
                </nav>
            </div>

            @include('frontend.sidebar.sidebar')

        </div>
    </div>
@endsection


