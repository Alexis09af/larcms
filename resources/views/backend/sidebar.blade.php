<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<?php $currentUser = Auth::user() ?>
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ $currentUser->gravatar() }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ $currentUser->nombre }}</p>

            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li>
                <a href="{{ url('/admin') }}">
                    <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pencil"></i>
                    <span>Blog</span>
                    <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('backend.blog.index')}}"><i class="fa fa-circle-o"></i> Todas las publicaciones</a></li>
                    <li><a href=" {{route('backend.blog.create')}}"><i class="fa fa-circle-o"></i> Añadir nueva</a></li>
                </ul>
            </li>
             @if (check_user_permissions(request(), "Categorias@index"))
            <li><a href="{{ route('backend.categorias.index') }}"><i class="fa fa-folder"></i> <span>Categorías</span></a></li>
             @endif

            @if (check_user_permissions(request(), "Redes@index"))
                <li><a href="{{ route('backend.redes-sociales.index') }}"><i class="fa fa-thumbs-o-up"></i> <span>Redes Sociales</span></a></li>
            @endif
            @if (check_user_permissions(request(), "Usuarios@index"))
                <li><a href="{{ route('backend.usuarios.index') }}"><i class="fa fa-users"></i> <span>Usuarios</span></a></li>
            @endif
            <li>
                <a href="https://es.gravatar.com/" target="_blank">
                    <i class="fa fa-user "></i> <span>Foto de perfil</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
