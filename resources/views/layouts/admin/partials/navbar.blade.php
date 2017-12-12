<nav class="navbar-expand-lg navbar fixed-top bg-light" id="mainNav"> {{-- --}}
    <div class="container">
        <a class="navbar-brand js-scroll-trigger text-primary" href="#page-top">LIB Admin</a>

        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                @if (Auth::check())
                    <li class="nav-item dropdown mx-0 mx-lg-1">
                        <a href="#"  class="dropdown-toggle nav-link py-3 px-0 px-lg-3  text-secondary text-uppercase" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li class="px-3"><a href="{{ url('/admin/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>

                    </li>

                @endif


            </ul>
        </div>
    </div>
</nav>