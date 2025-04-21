            @csrf
            @if (Route::has('login'))
                @auth
                    <div class="dropdown">
                        <a class="nav-link me-4 dropdown-toggle link-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{route('profile.edit')}}">Settings</a></li>
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <li><a class="dropdown-item" href="{{route('logout')}}"  onclick="event.preventDefault();
                                                this.closest('form').submit()">Sign Out</a></li>
                            </form>
                        </ul>
                    </div>
            @else
                        <div class="dropdown">
                        <a class="nav-link me-4 dropdown-toggle link-dark" href="{{ route('login') }}" >
                            Account</a>
                    </div>
                @endauth
             @endif
