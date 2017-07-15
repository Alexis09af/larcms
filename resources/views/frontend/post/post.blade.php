@extends('frontend.includes.header_footer')

@section('contenido')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post-item post-detail">
                   @if($post->imagen)
                        <div class="post-item-image">
                                <img src="{{ $post->imagen }}" alt="{{ $post->title }}">
                        </div>
                    @endif
                    <div class="post-item-body">
                        <div class="padding-10">
                            <h1>{{$post->title}}</h1>

                            <div class="post-meta no-border">
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i><a href="#"> {{$post->autor->name}}</a></li>
                                    <li><i class="fa fa-clock-o"></i><time> {{$post->fechaPublicacion}}</time></li>
                                    <li><i class="fa fa-tags"></i><a href="#"> Blog</a></li>
                                    <li><i class="fa fa-comments"></i><a href="#">5 comentarios</a></li>
                                </ul>
                            </div>
                            <div>
                                {!! $post->body_html !!}
                            </div>
                    </div>
                </article>

                <article class="post-author padding-10">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img alt="Author 1" src="/img/author.jpg" class="media-object">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#">{{$post->autor->name}}</a></h4>
                            <div class="post-author-count">
                                <a href="#">
                                    <i class="fa fa-clone"></i>
                                    90 posts
                                </a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad aut sunt cum, mollitia excepturi neque sint magnam minus aliquam, voluptatem, labore quis praesentium eum quae dolorum temporibus consequuntur! Non.</p>
                        </div>
                    </div>
                </article>
                <!--
                    Comentarios
                -->
            </div>

            @include('frontend.sidebar.lateral_derecho')

        </div>
    </div>
@endsection


