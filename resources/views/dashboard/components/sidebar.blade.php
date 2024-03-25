<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>

            <li class="{{ Request::is('category') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('category') }}"><i class="fas fa-columns"></i> <span>Category</span></a>
            </li>

            <li class="{{ Request::is('genre') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('genre') }}"><i class="fas fa-columns"></i> <span>Genre</span></a>
            </li>

            <li class="{{ Request::is('comment') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('comment') }}"><i class="fas fa-columns"></i> <span>Comment</span></a>
            </li>

            <li class="menu-header">Forms</li>
            <li class="nav-item dropdown {{ $type_menu === 'forms' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"
                    data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Forms Tambah</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('tambah-anime') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('tambah-anime') }}">Tambah Anime</a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('tambah-genre') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('tambah-genre') }}">Tambah Genre</a>
                    </li>
                </ul>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('tambah-category') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('tambah-category') }}">Tambah Category</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
