@include('layouts.head')
@include('layouts.header')
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            @if(Auth::user()->isAdmin())
                                {{--<a class="nav-link" href="{{ route('admin') }}">--}}
                                    {{--{{ __('Admin Home') }}--}}
                                {{--</a>--}}
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" href="{{ route('admin') }}"
                                       data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ __('Admin Home') }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('admin') }}">
                                            {{ __('Admin Home') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('user.index') }}">
                                            {{ __('List User') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('band.index') }}">
                                            {{ __('List Band') }}
                                        </a>
                                    </div>
                                </li>
                            @endif
                            <li><a class="nav-link" href="{{ route('home')}}"><i class="fa fa-home" style="font-size: 18px"></i>{{ __('') }}</a></li>
                            <li><a class="nav-link" href="{{ route('band.index')}}">{{ __('Band Manage') }}</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{action('UserController@profile')}}"><i class="fa fa-user-circle"></i>
                                        {{ __('Image Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="navbar-brand">
                                <img class="circle responsive-img" src="/storage/avatars/{{ \Illuminate\Support\Facades\Auth::user()->avatar }}" height="30">
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <section>
            @yield('content')
            </section>
        </main>
    </div>
@include('layouts.footer')
</body>
</html>
