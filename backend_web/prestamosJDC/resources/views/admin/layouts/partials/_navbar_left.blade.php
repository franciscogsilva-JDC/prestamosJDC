<ul id="slide-out" class="side-nav fixed side-nav-fgs">
    <li>
        <div class="brand-sidenav-fgs valign-wrapper center-align" style="background-color: #303030;">
            <a href="{{ route('welcome') }}">
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
            <a href="{{ route('requests.index') }}" {{ $menu_item == 2 ? 'class=active-fgs' : '' }}><i class="material-icons">assignment</i>Solicitudes</a>
        </div>
    </li>    
    @if(Auth::user()->type->id===1 || Auth::user()->type->id===6)
        <li>
            <div class="menu-item-fgs valign-wrapper">
                <a href="{{ route('calendar.index') }}" {{ $menu_item == 3 ? 'class=active-fgs' : '' }}><i class="material-icons">date_range</i>Programación</a>         
            </div>
        </li>
    @endif
    <li><div class="divider-fgs"></div></li>    
    @if(Auth::user()->type->id===1)
        <li>
            <div class="menu-item-fgs valign-wrapper">
                <a href="{{ route('users.index') }}" {{ $menu_item == 4 ? 'class=active-fgs' : '' }}><i class="material-icons">group</i>Usuarios</a>         
            </div>
        </li>
    @endif
    @if(Auth::user()->type->id===1 || Auth::user()->type->id===6)
        <li>
            <div class="menu-item-fgs valign-wrapper">
                <a href="{{ route('spaces.index') }}" {{ $menu_item == 5 ? 'class=active-fgs' : '' }}><i class="material-icons">domain</i>Espacios</a>
            </div>
        </li>
    @endif
    @if(Auth::user()->type->id===1 || Auth::user()->type->id===7 || Auth::user()->type->id===8)
        <li>
            <div class="menu-item-fgs valign-wrapper">
                <a href="{{ route('resources.index') }}" {{ $menu_item == 6 ? 'class=active-fgs' : '' }}><i class="material-icons">category</i>Recursos</a>         
            </div>
        </li>
    @endif
    @if(Auth::user()->type->id===1)
        <li>
            <div class="menu-item-fgs valign-wrapper">
                <a href="{{ route('dependencies.index') }}" {{ $menu_item == 7 ? 'class=active-fgs' : '' }}><i class="material-icons">device_hub</i>Dependencias</a>         
            </div>
        </li>
        <li>
            <div class="menu-item-fgs valign-wrapper">
                <a href="{{ route('programs.index') }}" {{ $menu_item == 8 ? 'class=active-fgs' : '' }}><i class="material-icons">school</i>Programas</a>         
            </div>
        </li>
        <li>
            <div class="menu-item-fgs valign-wrapper">
                <a href="{{ route('headquarters.index') }}" {{ $menu_item == 9 ? 'class=active-fgs' : '' }}><i class="material-icons">place</i>Sedes</a>         
            </div>
        </li>
        <li>
            <div class="menu-item-fgs valign-wrapper">
                <a href="{{ route('buildings.index') }}" {{ $menu_item == 10 ? 'class=active-fgs' : '' }}><i class="material-icons">location_city</i>Edificios</a>         
            </div>
        </li>
    @endif
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
