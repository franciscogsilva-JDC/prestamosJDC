<ul id="slide-out" class="side-nav fixed side-nav-fgs">
    <li>
        <div class="brand-sidenav-fgs valign-wrapper center-align" style="background-color: #212121;">
            <a href="{{ route('home') }}">
                <img class="responsive-img logo-fgs" src="{{ asset('img/system32/logo-CMS.png') }}">
            </a>
        </div>
    </li>
    <li><div class="divider-fgs"></div></li>
    <li>
        <div class="menu-item-fgs valign-wrapper">
            <a href="{{ route('admin.index') }}" {{ $menu_item == 1 ? 'class=active-fgs' : '' }}><i class="material-icons">dashboard</i>Administración</a>         
        </div>
    </li>
    <li><div class="divider-fgs"></div></li>
    <li>
        <div class="menu-item-fgs valign-wrapper">
            <a href="" {{ $menu_item == 2 ? 'class=active-fgs' : '' }}><i class="material-icons">assignment</i>Solicitudes</a>         
        </div>
    </li>
    <li>
        <div class="menu-item-fgs valign-wrapper">
            <a href="" {{ $menu_item == 3 ? 'class=active-fgs' : '' }}><i class="material-icons">date_range</i>Programación</a>         
        </div>
    </li>
    <li><div class="divider-fgs"></div></li>
    <li>
        <div class="menu-item-fgs valign-wrapper">
            <a href="" {{ $menu_item == 4 ? 'class=active-fgs' : '' }}><i class="material-icons">group</i>Usuarios</a>         
        </div>
    </li>
    <li>
        <div class="menu-item-fgs valign-wrapper">
            <a href="" {{ $menu_item == 5 ? 'class=active-fgs' : '' }}><i class="material-icons">domain</i>Espacios</a>
        </div>
    </li>
    <li>
        <div class="menu-item-fgs valign-wrapper">
            <a href="" {{ $menu_item == 6 ? 'class=active-fgs' : '' }}><i class="material-icons">category</i>Recursos</a>         
        </div>
    </li>
    <li>
        <div class="menu-item-fgs valign-wrapper">
            <a href="" {{ $menu_item == 7 ? 'class=active-fgs' : '' }}><i class="material-icons">device_hub</i>Dependencias</a>         
        </div>
    </li>
    <li>
        <div class="menu-item-fgs valign-wrapper">
            <a href="" {{ $menu_item == 8 ? 'class=active-fgs' : '' }}><i class="material-icons">school</i>Programas</a>         
        </div>
    </li>
    <li><div class="divider-fgs"></div></li>
    <li>
        <div class="menu-item-fgs valign-wrapper">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="material-icons">exit_to_app</i>Cerrar Sesión
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </li>
    <li><div class="divider-fgs"></div></li>
</ul>
