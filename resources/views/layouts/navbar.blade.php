<nav class="custom-navbar navbar navbar-expand-md navbar-dark" aria-label="Furni navigation bar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('customer.index') }}">Dwijaya Mebel<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item {{ Request::is('customer') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('customer.index') }}">Home</a>
                </li>
                <li class="nav-item {{ Request::is('shop') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('customer.shop') }}">Shop</a>
                </li>
                <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('customer.about') }}">About us</a>
                </li>
                <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('customer.contact') }}">Contact us</a>
                </li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-lg-5 align-items-center">
                @auth
                    <li class="nav-item dropdown">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle d-flex align-items-center gap-2" 
                                    type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" 
                                    style="border-radius: 30px; padding: 5px 15px; background-color: #f9bf29; border: none;">
                                
                                <div class="d-flex justify-content-center align-items-center shadow-sm" 
                                     style="width: 25px; height: 25px; background-color: #d4a017; border-radius: 50%; font-size: 12px; color: white; font-weight: bold;">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                
                                <span style="color: #2f2f2f; font-weight: 600;">{{ Auth::user()->name }}</span>
                            </button>
                            
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="dropdownMenuButton" style="border-radius: 10px;">
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                @else 
                    <li class="nav-item">
                        <a class="nav-link btn btn-white-outline py-1 px-3 me-2" href="{{ route('login') }}" style="border-radius: 20px;">Login</a>
                    </li>
                @endauth

                <li class="ms-3">
                    <a class="nav-link" href="{{ route('customer.checkout') }}">
                        <img src="{{ asset('template_customer/images/cart.svg') }}" width="24">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>