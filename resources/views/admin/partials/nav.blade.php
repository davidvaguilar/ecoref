

<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Navegación</li>
    <!-- Optionally, you can add icons to the links -->

    <li class="{{ setActiveRoute('dashboard') }}">
        <a href="{{ route('dashboard') }}">
            <i class="fa fa-home"></i> <span>Inicio</span>
        </a>
    </li>
<!-- Nuevo OT -->
        <li class="{{ setActiveRoute('admin.posts.index') }}">
            <a href="{{ route('admin.posts.index') }}">
                <i class="fa fa-wrench"></i> <span>Ordenes de Trabajo</span>
            </a>
        </li>
    @can('view', new App\User)
        <li class="{{ setActiveRoute('admin.clients.index') }}">
            <a href="{{ route('admin.clients.index') }}">
                <i class="fa fa-users"></i> <span>Clientes</span>
            </a>
        </li>
        <li class="treeview {{ setActiveRoute(['admin.users.index', 'admin.users.create']) }}">
            <a href="#"><i class="fa fa-user"></i> <span>Usuarios</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ setActiveRoute('admin.users.index') }}">
                    <a href="{{ route('admin.users.index') }}">
                        <i class="fa fa-eye"> Ver todos los usuarios</i>
                    </a>
                </li>
                <li class="{{ setActiveRoute('admin.users.create') }}">
                    <a href="{{ route('admin.users.create') }}">
                        <i class="fa fa-pencil"> Crear un usuario</i>
                    </a>
                </li>
            </ul>
        </li>

        <li class="treeview {{ setActiveRoute(['admin.types.index', 'admin.problems.index', 'admin.refrigerants.index']) }}">
            <a href="#"><i class="fa fa-cog"></i> <span>Configuraciones</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ setActiveRoute('admin.types.index') }}">
                    <a href="{{ route('admin.types.index') }}">
                        <i class="fa fa-circle-o text-red"></i> <span>Tipos de Orden</span>
                    </a>
                </li>
                <li class="{{ setActiveRoute('admin.problems.index') }}">
                    <a href="{{ route('admin.problems.index') }}">
                        <i class="fa fa-circle-o text-yellow"></i> <span>Problemas</span>
                    </a>
                </li>
                <li class="{{ setActiveRoute('admin.refrigerants.index') }}">
                    <a href="{{ route('admin.refrigerants.index') }}">
                        <i class="fa fa-circle-o text-aqua"></i> <span>Refrigerantes</span>
                    </a>
                </li>
            </ul>
        </li>
    @else
        <li class="{{ setActiveRoute(['admin.users.show', 'admin.users.edit']) }}">
            <a href="{{ route('admin.users.show', auth()->user()) }}">
                <i class="fa fa-user"></i> <span>Perfil</span>
            </a>
        </li>
    @endcan
    @can('view', new \Spatie\Permission\Models\Role)
        <li class="{{ setActiveRoute(['admin.roles.index', 'admin.roles.edit']) }}">
            <a href="{{ route('admin.roles.index') }}">
                <i class="fa fa-gear"></i> <span>Roles</span>
            </a>
        </li>
    @endcan
    @can('view', new \Spatie\Permission\Models\Permission)
        <li class="{{ setActiveRoute(['admin.permissions.index', 'admin.permissions.edit']) }}">
            <a href="{{ route('admin.permissions.index') }}">
                <i class="fa fa-gear"></i> <span>Permisos</span>
            </a>
        </li>
    @endcan
</ul>