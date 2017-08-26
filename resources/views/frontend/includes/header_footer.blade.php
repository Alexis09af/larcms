<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>LarCms</title>

        <link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/custom.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-default navbar-fixed-top">
              <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#the-navbar-collapse" aria-expanded="false">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="{{ route('blog') }}">larCMS
                  </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="the-navbar-collapse">
                  <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="{{ route('blog') }}">Blog</a></li>
                    <li><a href="{{route('admin')}}">Administración</a></li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container -->
            </nav>
        </header>

        @yield('contenido')

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <p class="copyright"></p>
                    </div>
                    <div class="col-md-4">
                        <nav>

                            <ul class="social-icons">
                                 @if(  $redes->fbLink  )
                                    <li><a href="{{$redes->fbLink}}" target="_blank" class="i fa fa-facebook"></a></li>
                                @endif
                                @if(  $redes->twtLink  )
                                 <li><a href="{{ $redes->twtLink }}" target="_blank" class="i fa fa-twitter"></a></li>
                                @endif
                                 @if(  $redes->gpLink  )
                                     <li><a href="{{ $redes->gpLink }}" target="_blank" class="i fa fa-google-plus"></a></li>
                                @endif
                                 @if(  $redes->instaLink  )
                                         <li><a href="{{ $redes->instaLink }}" target="_blank" class="i fa fa-instagram"></a></li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </footer>

        <script src="/js/bootstrap.min.js"></script>
    </body>
</html>