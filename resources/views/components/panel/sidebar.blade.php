<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('panel.dashboard') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('panel.dashboard') }}">AP</a>
        </div>
        <ul class="sidebar-menu">
            <li class="@active('panel.dashboard')">
                <a class="nav-link" href="{{ route('panel.dashboard') }}">
                    <i class="fas fa-fire"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">DATA</li>
            <li class="nav-item dropdown @active('panel.post,panel.category')">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-thumbtack"></i> <span>Post</span></a>
                <ul class="dropdown-menu">
                    <li class="@active('panel.post.index')">
                        <a class="nav-link" href="{{ route('panel.post.index') }}">Semua Post</a>
                    </li>
                    <li class="@active('panel.post.create')">
                        <a class="nav-link" href="{{ route('panel.post.create') }}">Tambah Post</a>
                    </li>
                    <li class="@active('panel.category.index')">
                        <a class="nav-link" href="{{ route('panel.category.index') }}">Kategori</a>
                    </li>
                </ul>
            </li>
            @role('admin')
            <li class="@active('panel.excul')">
                <a class="nav-link" href="{{ route('panel.excul.index') }}"><i class="fas fa-chalkboard-teacher"></i> <span>Ekstrakulikuler</span></a>
            </li>

            <li class="menu-header">WEBSITE</li>
            <li class="nav-item dropdown @active('panel.user')">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Users</span></a>
                <ul class="dropdown-menu">
                    <li class="@active('panel.user.index')">
                        <a class="nav-link" href="{{ route('panel.user.index') }}">Daftar User</a>
                    </li>
                    <li class="@active('panel.user.create')">
                        <a class="nav-link" href="{{ route('panel.user.create') }}">Tambah User</a>
                    </li>
                </ul>
            </li>
            @endrole
            <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
        </ul>
        
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ config('app.url') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Lihat Situs
            </a>
        </div>
    </aside>
</div>
