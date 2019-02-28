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
                                <a class="nav-link" href="{{ url( '/password' ) }}">
                                    <i class="fa fa-lock" aria-hidden="true"></i> Password
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ url( '/profile' ) }}">
                                    <i class="fa fa-user" aria-hidden="true"></i> Profile
                                </a>
                            </li>
                        @endguest

                    </ul>
                    @auth
                    <ul class="navbar-nav">
                        <li class="nav-item">
                                
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            
                        </li>
                    </ul>
                    @endauth
                </div>
            </div>
        </nav>