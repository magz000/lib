@extends('layouts.app')

@section('content')
    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="portfolio">
        <div class="container">
            {{--<h2 class="text-center text-uppercase text-secondary mb-0">Portfolio</h2>--}}
            {{--<hr class="star-dark mb-5">--}}
            <div class="row">

                <div class="col-md-6 col-lg-4 text-center">
                    <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-1">
                        <div class="portfolio-item-caption d-flex position-absolute h-100 w-100 round-top-left">
                            <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid round-top-left" src="img/portfolio/cabin.png" alt="">
                    </a>

                    <a  class="text-primary lead">Reserve a Space</a>

                </div>
                <div class="col-md-6 col-lg-4 text-center" >
                    <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-2">
                        <div class="portfolio-item-caption d-flex position-absolute h-100 w-100 round-top-left" >
                            <div class="portfolio-item-caption-content my-auto w-100 text-center text-white" >
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid round-top-left"  src="img/portfolio/cake.png" alt="">
                    </a>

                    <a class="text-primary lead">Events</a>
                </div>
                <div class="col-md-6 col-lg-4 text-center">
                    <a class="portfolio-item d-block mx-auto position-relative" style="z-index: 2" href="#portfolio-modal-3">
                        <div class="portfolio-item-caption d-flex position-absolute h-100 w-100 round-top-left">
                            <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>



                        <img class="img-fluid round-top-left" src="img/portfolio/circus.png" alt="">


                    </a>

                    <a class="text-primary lead">Co-working space</a>
                    {{--<div class="bg-white round-top-left position-absolute text-center d-flex w-100" style="z-index:2; bottom:0;">--}}
                        {{--<a class="text-primary lead font-weight-light text-center">Co-working space</a>--}}

                    {{--</div>--}}

                </div>
            </div>
        </div>
    </section>
@endsection
