<div class="col-md-4">
    <aside class="right-sidebar">

        <!--
        <div class="search-widget">
            <div class="input-group">
              <input type="text" class="form-control input-lg" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-lg btn-default" type="button">
                    <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </div>
        -->

        <div class="widget">
            <div class="widget-heading">
                <h4>Categorias</h4>
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

        <div class="widget">
            <div class="widget-heading">
                <h4>Popular Posts</h4>
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
                            <h6><a href="{{ route('muestraPost', $post->slug) }}">{{ $popular->titulo }}</a></h6>
                            <div class="post-meta">
                                <span>{{ $popular->fechaPublicacion }}</span>
                            </div>
                        </div>
                    </li>
                        @endforeach
                </ul>
            </div>
        </div>

        <!--
        <div class="widget">
            <div class="widget-heading">
                <h4>Tags</h4>
            </div>
            <div class="widget-body">
                <ul class="tags">
                    <li><a href="#">PHP</a></li>
                    <li><a href="#">Codeigniter</a></li>
                    <li><a href="#">Yii</a></li>
                    <li><a href="#">Laravel</a></li>
                    <li><a href="#">Ruby on Rails</a></li>
                    <li><a href="#">jQuery</a></li>
                    <li><a href="#">Vue Js</a></li>
                    <li><a href="#">React Js</a></li>
                </ul>
            </div>
        </div>
        -->
    </aside>
</div>