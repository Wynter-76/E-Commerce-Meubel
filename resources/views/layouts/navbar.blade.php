<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.html">Dwijaya Mebel<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item {{ Request::is('customer') ? 'active' : '' }}">
							<a class="nav-link" href="{{route ('customer.index')}}">Home</a>
						</li>
						<li class="nav-item {{ Request::is('shop') ? 'active' : '' }}">
							<a class="nav-link" href="{{route ('customer.shop')}}">Shop</a>
						</li>
						<li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
							<a class="nav-link" href="{{route ('customer.about')}}">About us</a>
						</li>
						<li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
							<a class="nav-link" href="{{route ('customer.contact')}}">Contact us</a>
						</li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li class="nav-item dropdown">
							@auth



							
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-items" href=" route('profile')">Profile</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item" >Logout</button>
                                    </form>
                                    </li>
                                    </ul>
                                </div>
                                @else 
                                <a href="{{ route('login' )}}">Login</a> | <a href="{{ route('register')}}">Register</a>
                                @endauth
							</a>
						</li>
						<li><a class="nav-link" href="{{route ('customer.checkout')}}"><img src="{{ asset('storage/images/cart.svg')}}"></a></li>
					</ul>
				</div>
			</div>
				
</nav>