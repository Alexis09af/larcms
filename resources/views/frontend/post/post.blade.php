@extends('frontend.includes.header_footer')

@section('contenido')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post-item post-detail">
                    @if ($post->image)
                        <div class="post-item-image">
                            <img src="{{ $post->image_url }}" alt="{{ $post->titulo }}">
                        </div>
                    @endif



                    <div class="post-item-body">
                        <div class="padding-10">
                            <h1>{{$post->titulo}}</h1>

                            <div class="post-meta no-border">
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i><a href="{{ route('autor', $post->autor->slug) }}"> {{$post->autor->nombre}}</a></li>
                                    <li><i class="fa fa-clock-o"></i><time> {{$post->fechaPublicacion}}</time></li>
                                    <li><i class="fa fa-folder"></i><a href="{{route('categoria',$post->categoria->slug)}}"> {{$post->categoria->titulo}}</a></li>
                                    <li><i class="fa fa-comments"></i><a href="#">5 comentarios</a></li>
                                </ul>
                            </div>
                            <div>
                                {!! $post->body_html !!}
                            </div>
                        </div>
                    </div>
                </article>

                <article class="post-author padding-10">
                    <div class="media">
                        <div class="media-left">
                            <a href="{{ route('autor', $post->autor->slug) }}">
                                <img alt="{{ $post->autor->nombre }}" width="60px" src="{{ $post->autor->gravatar() }}" class="media-object">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#">{{$post->autor->nombre}}</a></h4>
                            <div class="post-author-count">
                                <a href="{{ route('autor', $post->autor->slug) }}">
                                    <i class="fa fa-clone"></i>

                                    <?php $totalPosts = $post->autor->posts()->publicado()->count();?>
                                    {{$totalPosts}}
                                    <?php if($totalPosts==1){?> Publicación<?php }
                                    else{ ?> Publicaciones<?php } ?>

                                </a>
                            </div>
                            {!! $post->autor->biografia_html !!}
                        </div>
                    </div>
                </article>
                <!--
                    Comentarios
                -->
            </div>

            @include('frontend.sidebar.sidebar')

        </div>
    </div>
    @endsection


    </div>
