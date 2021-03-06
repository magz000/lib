<nav class="navbar-expand-lg navbar fixed-top bg-light" id="mainNav"> {{-- --}}
    <div class="container">
        <a class="navbar-brand js-scroll-trigger text-primary" href="{{route('public.index')}}">LIB</a>

        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                @if (Auth::guest())
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 text-secondary js-scroll-trigger" href="/#header">Home</a>
                    </li>

                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3  text-secondary js-scroll-trigger" href="/#about">About Us</a>
                    </li>

                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3  text-secondary js-scroll-trigger" href="/#services">Services</a>
                    </li>

                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3  text-secondary js-scroll-trigger" >Rates</a>
                    </li>

                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3  text-secondary js-scroll-trigger" >Events</a>
                    </li>

                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3  text-secondary js-scroll-trigger" href="/#contact">Contact</a>
                    </li>

                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3  text-secondary js-scroll-trigger" data-toggle="modal" data-target="#login">Login</a>
                    </li>

                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3  text-secondary js-scroll-trigger" data-toggle="modal" data-target="#register">Register</a>
                    </li>
                @else
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3  text-secondary js-scroll-trigger" href="{{route('client.home')}}">Home</a>
                    </li>

                    {{--<li class="nav-item mx-0 mx-lg-1">--}}
                        {{--<a class="nav-link py-3 px-0 px-lg-3  text-secondary js-scroll-trigger" href="{{route('client.users')}}">Messages</a>--}}
                    {{--</li>--}}

                    <li class="nav-item dropdown mx-0 mx-lg-1">


                        <a href="#"  class="dropdown-toggle nav-link py-3 px-0 px-lg-3  text-secondary text-uppercase" data-toggle="dropdown" role="button" aria-expanded="false">
                            <div class="rounded-circle float-left mr-1 avatar-sm"
                                 style="background: url('/img/avatar/{{ (Auth::user()->avatar != null ? Auth::user()->avatar->link : 'user.png') }}'); ">
                            </div>

                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li class="px-3"><a href="{{ route('client.profile', [Auth::user()->id]) }}"><i class="fa fa-btn fa-user"></i>&nbsp;Profile</a></li>

                            <li class="px-3"><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>&nbsp;Logout</a></li>
                        </ul>

                    </li>

                @endif


            </ul>
        </div>
    </div>
</nav>