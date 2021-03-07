<div class="container">
    <nav class="navbar flex-btw">
        <div class="nav-menu">
            <a class="logo" href="{{ route('post.home') }}">BLOGG</a>
            @auth
                <ul class="nav-list">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('post.create') }}">Create Post</a>
                    </li>
                </ul>
            @endauth
        </div>
        <div class="nav-menu">
            <div class="nav-search flex-btw" id="search">
                <form action="{{ route('post.index') }}" class="form-search">
                    <input name="search" class="form-search" type="search" placeholder="Search" aria-label="Search">
                    <button class="form-search-btn" type="submit">
                        <svg class="svg-icon icon-search" viewBox="0 0 20 20">
                            <path fill="#5f5f5f" d="M19.129,18.164l-4.518-4.52c1.152-1.373,1.852-3.143,1.852-5.077c0-4.361-3.535-7.896-7.896-7.896c-4.361,0-7.896,3.535-7.896,7.896s3.535,7.896,7.896,7.896c1.934,0,3.705-0.698,5.078-1.853l4.52,4.519c0.266,0.268,0.699,0.268,0.965,0C19.396,18.863,19.396,18.431,19.129,18.164z M8.567,15.028c-3.568,0-6.461-2.893-6.461-6.461s2.893-6.461,6.461-6.461c3.568,0,6.46,2.893,6.46,6.461S12.135,15.028,8.567,15.028z"></path>
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Right Side Of Navbar -->
            <div class="nav-menu nav-auth">
                <ul class="nav-list">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>