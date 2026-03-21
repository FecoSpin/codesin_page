<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <ul class="navigation-left">
            {{-- <li class="nav-item {{ setActiveRoute('dashboard') }}"  ><a class="nav-item-hold" href="{{route('dashboard')}}" ><i class="nav-icon i-Bar-Chart"></i><span class="nav-text">Dashboard</span></a>
                <div class="triangle"></div>
            </li> --}}
            @can('view', new App\User)
            <li class="nav-item nav-item {{ request()->is('admin/users*') ? 'active' : ''}}" data-item="users"><a class="nav-item-hold" href="#"><i class="nav-icon fas fa-user-friends"></i><span class="nav-text">Usuarios</span></a>
                <div class="triangle"></div>
            </li>
            @else
            <li class="nav-item {{ request()->is('admin/users*') ? 'active' : ''}}"  ><a class="nav-item-hold" href="{{route('admin.users.edit', auth()->user())}}" ><i class="nav-icon fas fa-user-friends"></i><span class="nav-text">Usuarios</span></a>
                <div class="triangle"></div>
            </li>
            @endcan
            <li class="nav-item nav-item {{ request()->is('admin/paginas*') ? 'active' : ''}}" data-item="paginas"><a class="nav-item-hold" href="#"><i class="nav-icon fas fa-window-restore"></i><span class="nav-text">Paginas</span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item nav-item {{ request()->is('admin/noticias*') ? 'active' : ''}}" data-item="noticias"><a class="nav-item-hold" href="#"><i class="nav-icon fas fa-newspaper"></i><span class="nav-text">Artículos y <br>Noticias</span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item nav-item {{ request()->is('admin/proyectos*') ? 'active' : ''}}" data-item="proyectos"><a class="nav-item-hold" href="#"><i class="nav-icon fas fa-tasks"></i><span class="nav-text">Proyectos</span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item nav-item {{ request()->is('admin/staff*') ? 'active' : ''}}" data-item="staff"><a class="nav-item-hold" href="#"><i class="nav-icon fas fa-user-friends"></i><span class="nav-text">Staff</span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item nav-item {{ request()->is('admin/testimonios*') ? 'active' : ''}}" data-item="testimonios"><a class="nav-item-hold" href="#"><i class="nav-icon fas fa-comments"></i><span class="nav-text">Testimonios</span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item nav-item {{ request()->is('admin/contenidos*') ? 'active' : ''}}" data-item="contenidos"><a class="nav-item-hold" href="#"><i class="nav-icon fas fa-photo-video"></i><span class="nav-text">Contenido interes</span></a>
                <div class="triangle"></div>
            </li>
            {{-- <li class="nav-item nav-item {{ request()->is('admin/biblioteca*') ? 'active' : ''}}" data-item="biblioteca"><a class="nav-item-hold" href="#"><i class="nav-icon fas fa-photo-video"></i><span class="nav-text">Biblioteca</span></a>
                <div class="triangle"></div>
            </li> --}}
            <li class="nav-item nav-item {{ request()->is('admin/biblioteca*') ? 'active' : ''}}"><a class="nav-item-hold"  href="{{route('admin.biblioteca.index')}}"><i class="nav-icon fas fa-photo-video"></i><span class="nav-text">Biblioteca</span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item nav-item"><a class="nav-item-hold" href="{{route('admin.excel.export')}}"><i class="nav-icon fas fa-file-excel"></i><span class="nav-text">Descargar Emails</span></a>
            </li>
        </ul>
    </div>
    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <!-- Submenu Dashboards-->
        <ul class="childNav" data-parent="paginas">
            {{-- <li class="nav-item"><a href="{{route('admin.posts.index')}}"><i class="nav-icon i-Add-File"></i><span class="item-name">ver todosPost</span></a></li> --}}
            <li class="nav-item">
                    <a href="{{route('admin.paginas.edit', 'home')}}"><i class="nav-icon i-Code-Window"></i><span class="item-name">Principal</span></a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.paginas.edit', 'quienes-somos')}}"><i class="nav-icon i-Code-Window"></i><span class="item-name">¿Quiénes somos?</span></a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.paginas.edit', 'que-hacemos')}}"><i class="nav-icon i-Code-Window"></i><span class="item-name">¿Qué hacemos?</span></a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.historia.edit', 'historia')}}"><i class="nav-icon i-Code-Window"></i><span class="item-name">Historia</span></a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.codetalks.index')}}"><i class="nav-icon i-Code-Window"></i><span class="item-name">CodeTalks</span></a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.codesinHechos.index')}}"><i class="nav-icon i-Code-Window"></i><span class="item-name">Codesin con hechos</span></a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.sinaloaNumeros.index')}}"><i class="nav-icon i-Code-Window"></i><span class="item-name">Sinaloa en números</span></a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.aviso.index')}}"><i class="nav-icon i-Code-Window"></i><span class="item-name">Aviso de privacidad</span></a>
            </li>
            <!-- <li class="nav-item">
                <a href="{{route('admin.covid.edit', 'covid')}}"><i class="nav-icon i-Code-Window"></i><span class="item-name">Covid</span></a>
            </li> -->
        </li>
        </ul>
        <ul class="childNav" data-parent="noticias">
            <li class="nav-item"><a href="{{route('admin.noticias.index')}}"><i class="nav-icon i-ID-3"></i><span class="item-name">ver todas las noticias</span></a></li>
            <li class="nav-item"><a href="{{route('admin.posicionamiento.index')}}"><i class="nav-icon i-ID-3"></i><span class="item-name">Posicionamiento</span></a></li>
            <li class="nav-item"><a href="{{route('admin.articulos.index')}}"><i class="nav-icon i-ID-3"></i><span class="item-name"> Apuntes del Desarrollo</span></a></li>
        </ul>
        <ul class="childNav" data-parent="proyectos">
            @foreach ($tags as $tag)
            <li class="nav-item"><a href="{{route('admin.tags.show', $tag)}}"><i class="nav-icon i-ID-3"></i><span class="item-name">ver {{$tag->name}}</span></a></li>
            @endforeach
        </ul>
        <ul class="childNav" data-parent="staff">
            @foreach ($departamentos as $departamento)
            <li class="nav-item"><a href="{{route('admin.departamentos.show', $departamento)}}"><i class="nav-icon i-ID-3"></i><span class="item-name">ver {{$departamento->name}}</span></a></li>
            @endforeach
        </ul>
        <ul class="childNav" data-parent="testimonios">
            <li class="nav-item"><a href="{{route('admin.testimonios.index')}}"><i class="nav-icon fas fa-user-circle"></i><span class="item-name">ver testimonios</span></a></li>
            <li class="nav-item"><a href="{{route('admin.testimonios.create')}}"><i class="nav-icon i-Add-User"></i><span class="item-name">Crear testimonio</span></a></li>
        </ul>
        <ul class="childNav" data-parent="contenidos">
            <li class="nav-item"><a href="{{route('admin.contenidos.index')}}"><i class="nav-icon i-Video"></i><span class="item-name">Multimedia</span></a></li>
            <!-- <li class="nav-item"><a href="{{route('admin.contenidos.create')}}"><i class="nav-icon i-File-Video"></i><span class="item-name">Crear contenido</span></a></li> -->
            <li class="nav-item"><a href="{{route('admin.estrategias.index')}}"><i class="nav-icon i-Gears"></i><span class="item-name">Estrategias</span></a></li>
            <li class="nav-item"><a href="{{route('admin.politicas.index')}}"><i class="nav-icon i-File-Clipboard-File--Text"></i><span class="item-name">ver Políticas publicas </span></a></li>


        </ul>
        <ul class="childNav" data-parent="biblioteca">
            <li class="nav-item"><a href="{{route('admin.biblioteca.show', ['id'=>9])}}"><i class="nav-icon fas fa-file"></i><span class="item-name">Pilares</span></a></li>
            <li class="nav-item"><a href="{{route('admin.biblioteca.show', ['id'=>10])}}"><i class="nav-icon fas fa-file"></i><span class="item-name">Ejes</span></a></li>
            <li class="nav-item"><a href="{{route('admin.biblioteca.show', ['id'=>11])}}"><i class="nav-icon fas fa-file"></i><span class="item-name">Gran Visión</span></a></li>
        </ul>
        <ul class="childNav" data-parent="users">
            <li class="nav-item"><a href="{{route('admin.users.index')}}"><i class="nav-icon fas fa-user-circle"></i><span class="item-name">ver todos usuarios</span></a></li>
            <li class="nav-item"><a href="{{route('admin.users.create')}}"><i class="nav-icon i-Pen-4"></i><span class="item-name">Crear un usuario</span></a></li>
        </ul>
    </div>
    <div class="sidebar-overlay"></div>
</div>
