@extends('layouts.client.app')


@section('content')
    @include('layouts.client.partials.header')

    @include('layouts.client.partials.about')

    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="services">
        <div class="container">

            <div class="row">

                <div class="col-md-6 col-lg-4 text-center">
                    <a class="portfolio-item d-block mx-auto">
                        <div class="portfolio-item-caption d-flex position-absolute h-100 w-100 round-top-left">
                            <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                                {{--<i class="fa fa-search-plus fa-3x"></i>--}}
                            </div>
                        </div>

                        <div class="bg-white w-100 position-absolute round-top-left p-2" style="bottom: 0" >
                            <h2  class="text-primary lead mt-2">Reserve a Space</h2>
                        </div>

                        <img class="img-fluid round-top-left" src="img/cafes/pic1.jpg" alt="">
                    </a>
                </div>
                <div class="col-md-6 col-lg-4 text-center" >
                    <a class="portfolio-item d-block mx-auto" >
                        <div class="portfolio-item-caption d-flex position-absolute h-100 w-100 round-top-left" >
                            <div class="portfolio-item-caption-content my-auto w-100 text-center text-white" >
                                {{--<i class="fa fa-search-plus fa-3x"></i>--}}
                            </div>
                        </div>

                        <div class="bg-white w-100 position-absolute round-top-left p-2" style="bottom: 0" >
                            <h2 class="text-primary lead mt-2">Events</h2>
                        </div>

                        <img class="img-fluid round-top-left"  src="img/cafes/pic2.jpg" alt="">
                    </a>


                </div>
                <div class="col-md-6 col-lg-4 text-center">
                    <a class="portfolio-item d-block mx-auto position-relative" >
                        <div class="portfolio-item-caption d-flex position-absolute h-100 w-100 round-top-left">
                            <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                                {{--<i class="fa fa-search-plus fa-3x"></i>--}}
                            </div>
                        </div>

                        <div class="bg-white w-100 position-absolute round-top-left p-2" style="bottom: 0" >
                            <h2 class="text-primary lead mt-2">Co-working space</h2>
                        </div>

                        <img class="img-fluid round-top-left" src="img/cafes/pic3.jpg" alt="">

                    </a>

                    {{--<div class="bg-white round-top-left position-absolute text-center d-flex w-100" style="z-index:2; bottom:0;">--}}
                        {{--<a class="text-primary lead font-weight-light text-center">Co-working space</a>--}}

                    {{--</div>--}}

                </div>
            </div>
        </div>
    </section>

    {{--<!-- Portfolio Modal 1 -->--}}
    {{--<div class="portfolio-modal mfp-hide" id="login-modal">--}}
        {{--<div class="portfolio-modal-dialog bg-white">--}}
            {{--<a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">--}}
                {{--<i class="fa fa-3x fa-times"></i>--}}
            {{--</a>--}}
            {{--<div class="container text-center">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-lg-8 mx-auto">--}}
                        {{--<h2 class="text-secondary text-uppercase mb-0">Project Name</h2>--}}
                        {{--<hr class="star-dark mb-5">--}}
                        {{--<img class="img-fluid mb-5" src="img/portfolio/cabin.png" alt="">--}}
                        {{--<p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>--}}
                        {{--<a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">--}}
                            {{--<i class="fa fa-close"></i>--}}
                            {{--Close Project</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    @include('layouts.client.partials.loginmodal')
    @include('layouts.client.partials.registermodal')
    @include('layouts.client.partials.contact')




@endsection

@section('script')
    <script>
        @if(Session::has('login_failed'))
            $('#login').modal('toggle');
        @endif

        @if($errors->any())
            $('#register').modal('toggle');
        @endif
    </script>

@endsection


