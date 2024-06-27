    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto">
                    <a class="navbar-brand" href="">
                        <img height="35px" src="{{ url('assets/images/logo/logo.png') }}">
                    </a>
                </li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                            class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                            class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary"
                            data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                <li class=" navigation-header">
                    <span data-i18n="Páginas">
                        Páginas
                    </span>
                    <i data-feather="more-horizontal"></i>
                </li>

                <li class="nav-item {{ Route::is('dashboard*') ? 'active' : '' }} ">
                    <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                        <i class="fa-solid fa-chart-line"></i>
                        <span class="menu-title text-truncate" data-i18n="Dashboard">
                            Dashboard
                        </span>
                    </a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                            data-feather="layers"></i><span class="menu-title text-truncate"
                            data-i18n="Operação">Operação</span></a>
                    <ul class="menu-content">
                        <li class="nav-item {{ Route::is('purchase*') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ route('purchase.index') }}">
                                <i class="fa-solid fa-money-bill-transfer"></i>
                                <span class="menu-title text-truncate" data-i18n="Comprar">
                                    Comprar
                                </span>
                            </a>
                        </li>
                        <li class="nav-item {{ Route::is('sales*') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ route('sales.index') }}">
                                <i class="fa-solid fa-ranking-star"></i> 
                                <span class="menu-title text-truncate"
                                    data-i18n="Comprar">
                                    Vendas
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class=" navigation-header">
                    <span data-i18n="Admin">
                        Admin
                    </span>
                    <i data-feather="more-horizontal"></i>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                            data-feather="file-text"></i><span class="menu-title text-truncate"
                            data-i18n="Cadastros">Cadastros</span></a>
                    <ul class="menu-content">
                        <li class="nav-item {{ Route::is('users*') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ route('users.index') }}">
                                <i class="fas fa-user"></i>
                                <span class="menu-title text-truncate" data-i18n="Usuários">
                                    Usuários
                                </span>
                            </a>
                        </li>
                        <li class="nav-item {{ Route::is('clients*') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ route('clients.index') }}">
                                <i class="fas fa-users"></i>
                                <span class="menu-title text-truncate" data-i18n="Usuários">
                                    Clientes
                                </span>
                            </a>
                        <li class="nav-item {{ Route::is('products*') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ route('products.index') }}">
                                <i class="fa-solid fa-boxes-stacked"></i>
                                <span class="menu-title text-truncate" data-i18n="Usuários">
                                    Produtos
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class=" nav-item">
                    <a class="d-flex align-items-center" href="">
                        <i data-feather="alert-triangle"></i>
                        <span class="menu-title text-truncate" data-i18n="permission">
                            Permissões
                        </span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{ Route::is('manage.access.permissions.index') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ route('manage.access.permissions.index') }}">
                                <i data-feather="list"></i>
                                <span class="menu-item text-truncate" data-i18n="List">
                                    Menus
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
