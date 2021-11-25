<li class="nav-item dropdown @active('panel.user')">
  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
    <i class="fas fa-users"></i><span>Users</span></a>
  <ul class="dropdown-menu">
    <li class="@active('panel.user.index')">
      <a class="nav-link" href="{{ route('panel.user.index') }}">Daftar User</a>
    </li>
    <li class="@active('panel.user.create')">
      <a class="nav-link" href="{{ route('panel.user.create') }}">Tambah User</a>
    </li>
  </ul>
</li>
