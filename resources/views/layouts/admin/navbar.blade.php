<nav class="navbar-expand-lg navbar fixed-top bg-primary py-1" id="mainNav2"> {{-- --}}
    <div class="container">
        <a class="navbar-brand js-scroll-trigger text-white" href="{{ route('admin.login') }}">LIB Admin</a>

        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                @if (Auth::check())
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 text-white js-scroll-trigger" href="{{route('admin.stores')}}">Stores</a>
                    </li>

                    <li class="nav-item dropdown mx-0 mx-lg-1">
                        <a href="#"  class="dropdown-toggle nav-link py-3 px-0 px-lg-3 text-white text-uppercase" data-toggle="dropdown" role="button" aria-expanded="false">
                            <div class="rounded-circle float-left mr-1 avatar-sm"
                                 style="background: url('/img/avatar/{{ (Auth::user()->avatar != null ? Auth::user()->avatar->link : 'user.png') }}');">
                            </div>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li class="px-3"><a href="{{ route('admin.logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>

                    </li>

                @endif


            </ul>
        </div>
    </div>
</nav>