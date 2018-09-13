<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a href="{{url('/')}}">
        <div class="logo-container">
            <div class="logo margin-left-10">
                <img class="" src="{{url('/images/logo.png')}}" alt="Econet Logo"  data-html="true">
            </div>


        </div>
    </a>
</div>

<div class="collapse navbar-collapse" id="navigation-index">
    <ul class="nav navbar-nav navbar-right">
        <li>
            <a href="{{route('create.request')}}" >
                <i class="material-icons">assignment</i> Request FTTH For Your Area
            </a>
        </li>
        <li>
            <a href="{{route('ftth.areas')}}">
                 <i class="material-icons">remove_red_eye</i>View Areas With FTTH
            </a>

        </li>
        <li>
            <a href="{{route('application.create')}}">
                <i class="material-icons">assignment_turned_in</i> Apply
            </a>
        </li>

        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <!--<li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>-->
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                   <i class="material-icons">face</i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif


    </ul>
</div>

