@extends('layouts.app')

@section('content')
    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="portfolio">
        <div class="container">
            {{--<h2 class="text-center text-uppercase text-secondary mb-0">Portfolio</h2>--}}
            {{--<hr class="star-dark mb-5">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-4 col-lg-4">--}}
                    {{--<div class="position-relative bg-primary">--}}
                        {{--<div class="position-absolute mx-auto d-block" style="height: 200px; ">--}}
                            {{--<img class="img-fluide round-top-left" style="z-index: 1;" src="{{asset('img/portfolio/cabin.png')}}" alt="">--}}
                        {{--</div>--}}

                        {{--<div class="bg-white position-absolute" style="z-index: 3; bottom: 0;">--}}
                            {{--test--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}

            {{--<br><br><br><br>--}}
            {{--<br><br><br><br>--}}
            {{--<br><br><br><br>--}}

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
                    <a class="portfolio-item d-block mx-auto position-relative" style="z-index: 2">
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
@endsection
