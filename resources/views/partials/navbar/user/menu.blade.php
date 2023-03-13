<nav class="main-navbar">
    <div class="container">
        <ul>
            <li class="menu-item">
                <a href="{{ route('landing') }}" class='menu-link'>
                    <span>
                        <i class="bi bi-grid-fill"></i>
                        Dashboard
                    </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('books.index') }}" class='menu-link'>
                    <span>
                        <i class="bi bi-grid-fill"></i>
                        Buku
                    </span>
                </a>
            </li>
            @auth
                <li class="menu-item">
                    <a href="{{ route('loans.index') }}" class='menu-link'>
                        <span>
                            <i class="bi bi-grid-fill"></i>
                            Peminjaman
                        </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('history') }}" class='menu-link'>
                        <span>
                            <i class="bi bi-grid-fill"></i>
                            History
                        </span>
                    </a>
                </li>
                @role('admin')
                    <li class="menu-item">
                        <a href="{{ route('dashboard.index') }}" class='menu-link'>
                            <span>
                                <i class="bi bi-grid-fill"></i>
                                Dashboard
                            </span>
                        </a>
                    </li>
                @endrole
            @endauth
            <li class="menu-item has-sub">
                <a href="#" class='menu-link'>
                    <span>
                        <i class="bi bi-stack"></i>
                        Profile
                    </span>
                </a>
                <div class="submenu">
                    <div class="submenu-group-wrapper">
                        <ul class="submenu-group">
                            @auth
                                <li class="submenu-item">
                                    <a href="{{ route('profile.index') }}" class='submenu-link'>Akun Saya</a>
                                </li>
                                <li class="submenu-item">
                                    <a class="submenu-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Keluar
                                    </a>
                                    <form class='d-none' id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </li>
                            @else
                                <li class="submenu-item">
                                    <a href="{{ route('login.index') }}" class='submenu-link'>Login</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="{{ route('register.index') }}" class='submenu-link'>Register</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
