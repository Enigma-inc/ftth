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
                <img class="" src="{{url('/images/logo.png')}}" alt="Econet Logo" rel="tooltip"
                     title="Econet FTTH - Fiber To The Home" data-placement="bottom" data-html="true">
            </div>
            <!-- <div class="brand">
                 ECONET - FTTH
             </div>-->


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
            <a href="#">
                 <i class="material-icons">remove_red_eye</i>View Areas With FTTH
            </a>

        </li>
        <li>
            <a href="{{route('ftth.apply')}}">
                <i class="material-icons">assignment_turned_in</i> Apply For FTTH
            </a>
        </li>


    </ul>
</div>