        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="{{ url( '/' ) }}">
                    <img src="{{ asset( 'img/logo.png' ) }}" 
                        width="100px" 
                        title="{{ config('app.name', 'Laravel') }}" 
                        alt="{{ config('app.name', 'Laravel') }}">
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">

                        @guest

                            <li class="nav-item">
                                <a class="nav-link {{ ( Route::currentRouteName() == 'index' ) ? 'active' : '' }}" href="{{ route('index') }}">
                                    <i class="fa fa-home" aria-hidden="true"></i> Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ ( Route::currentRouteName() == 'contact' ) ? 'active' : '' }}" href="{{ route('contact') }}">
                                    <i class="fa fa-phone" aria-hidden="true"></i> Contact
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ ( Route::currentRouteName() == 'login' ) ? 'active' : '' }}" href="{{ route('login') }}">
                                    <i class="fa fa-unlock" aria-hidden="true"></i> {{ __('Login') }}
                                </a>
                            </li>
                            @if (Route::has('register'))

                                <li class="nav-item">
                                    <a class="nav-link {{ ( Route::currentRouteName() == 'register' ) ? 'active' : '' }}" href="{{ route('register') }}">
                                        <i class="fa fa-lock" aria-hidden="true"></i> {{ __('Register') }}
                                    </a>
                                </li>

                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link {{ ( Route::currentRouteName() === "home" ) ? 'active' : '' }}" href="{{ url( '/home' ) }}">
                                    <i class="fa fa-home" aria-hidden="true"></i> Home
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ ( Route::currentRouteName() === "outgoing" ) ? 'active' : '' }}" href="{{ url( '/outgoing' ) }}">
                                    <i class="fa fa-money-bill" aria-hidden="true"></i> Outgoing
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ ( Route::currentRouteName() === "incoming" ) ? 'active' : '' }}" href="{{ url( '/incoming' ) }}">
                                    <i class="fa fa-money-bill" aria-hidden="true"></i> Incoming
                                </a>
                            </li>

                            @if( auth()->user()->role == 3 )

                            <li class="nav-item">
                                <a class="nav-link {{ ( Route::currentRouteName() === "admin_allocation" ) ? 'active' : '' }}" href="{{ url( '/admin_allocation' ) }}">
                                    <i class="fa fa-lock" aria-hidden="true"></i> Admin Allocation
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ ( Route::currentRouteName() === "member_allocation" ) ? 'active' : '' }}" href="{{ url( '/member_allocation' ) }}">
                                    <i class="fa fa-lock" aria-hidden="true"></i> Member Allocation
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ ( Route::currentRouteName() === "users" ) ? 'active' : '' }}" href="{{ url( '/users' ) }}">
                                    <i class="fa fa-users" aria-hidden="true"></i> Users
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ ( Route::currentRouteName() === "orders" ) ? 'active' : '' }}" href="{{ url( '/orders' ) }}">
                                    <i class="fa fa-money-bill" aria-hidden="true"></i> Orders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ ( Route::currentRouteName() === "block" ) ? 'active' : '' }}" href="{{ url( '/block' ) }}">
                                    <i class="fa fa-lock" aria-hidden="true"></i> Block
                                </a>
                            </li>

                            @endif

                            <li class="nav-item">
                                <a class="nav-link {{ ( Route::currentRouteName() === "password" ) ? 'active' : '' }}" href="{{ url( '/password' ) }}">
                                    <i class="fa fa-lock" aria-hidden="true"></i> Password
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ ( Route::currentRouteName() === "profile" ) ? 'active' : '' }}" href="{{ url( '/profile' ) }}">
                                    <i class="fa fa-user" aria-hidden="true"></i> Profile
                                </a>
                            </li>

                            <li class="nav-item">

                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                                
                            </li>

                        @endguest

                    </ul>

                </div>
            </div>
        </nav>