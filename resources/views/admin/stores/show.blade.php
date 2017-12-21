@extends('layouts.admin.app')

@section('content')

    <section class="pt-5">
        <div class="">

            @if($store->cover_image != null)
            <div class="cover-image d-block"
                 style="background: url('/img/covers/{{$store->cover_image}}');">
            </div>
            @endif

            @if(Session::has('flash_message'))
                <div class="alert alert-success mt-5 mx-5">
                    {{ Session::get('flash_message') }}
                </div>
            @endif

            @if(Session::has('upload_failed'))
                <div class="alert alert-danger mt-5 mx-5">
                    {{ Session::get('upload_failed') }}
                </div>
             @endif

            <div class="row p-5 mx-0 justify-content-center">


                <div class="col-md-6">

                    <h1 class="text-primary">{{$store->name}}
                        <a class="btn-primary-white m-1 " href="{{route('admin.stores.edit', $store->id)}}"> <i class="fa fa-pencil"></i></a><br>
                    </h1>
                    <small>{{$store->address}}</small>



                    <br><br>
                    <a class="btn btn-primary m-1" href="{{route('admin.stores')}}">Back</a>
                    <a class="btn btn-primary m-1" href="{{route('admin.stores.changecoverimage', $store->id)}}">{{$store->cover_image == null ? 'Add' : 'Change'}} Cover Photo</a>

                    <br><br>
                    <br><br>

                    <h4 class="text-primary">Photos
                        <a class="btn-primary-white m-1" href="{{route('admin.stores.addphotos', $store->id)}}"><i class="fa fa-plus"></i></a>
                    </h4>

                    <div class="row">

                        @foreach($store->photo as $key=>$photo)
                            <div onclick="openModal({{$key}})" class="m-1 p-1" data-toggle="modal" data-target="#view_image" style="background: url({{asset('/img/photos/'.$store->id.'/'. $photo->file_name)}}); width: 120px; height: 80px; background-position: center center !important;
                                    background-size: cover !important;">
                            </div>


                        @endforeach

                    </div>

                </div>

                {{--Employees--}}
                <div class="col-md-6 mt-3">

                    <h4 class="text-primary">Employees
                        <a class="btn-primary-white m-1" href="{{route('admin.stores.addemployee', $store->id)}}"><i class="fa fa-plus"></i></a>
                    </h4>

                    <div class="row justify-content-center">
                        @foreach($store->user as $employee)

                            <div class="card col-md-10 mt-2 shadow">

                                <div class="card-body">
                                    <button class="close" data-toggle="modal" data-target="#delete-{{$employee->id}}">
                                        &times;
                                    </button>


                                    {{--<a href="{{route('admin.stores.show', $employee->id)}}"--}}
                                    {{--style="text-decoration:none;">--}}
                                    <div class="rounded-circle float-left mr-3 avatar-md"
                                         style="background: url('/img/avatar/{{ ($employee->avatar != null ? $employee->avatar->link : 'user.png') }}'); ">
                                    </div>

                                    <div>
                                        <div class="text-primary lead mb-0">
                                            {{$employee->name}}</div>

                                        <small class="text-secondary">
                                            {{$employee->email}}
                                        </small>
                                    </div>
                                    {{--</a>--}}

                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="delete-{{$employee->id}}" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete Employee</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel
                                            </button>

                                            <form action="{{route('admin.stores.deleteemployee', $employee->id)}}"
                                                  method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="delete"/>
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


                <div class="modal fade" id="view_image" aria-hidden="true">
                    <div class="modal-dialog modal-lg" style="">

                        <div class="modal-content" style="">
                            <div id="photos-carousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">

                                    @foreach($store->photo as $key=>$photo)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">

                                            <div class="d-block mx-auto position-relative" >
                                                <div class="image-view d-flex position-absolute h-100 w-100" >
                                                    <div class="image-view-option-top">
                                                        {{--<i class="fa fa-search-plus fa-3x"></i>--}}
                                                        <button type="button" class="close text-white" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>

                                                        <small>{{$photo->file_name}}</small>

                                                    </div>


                                                    <div class="image-view-option-bottom" >
                                                        <button class="close2" data-toggle="modal" data-target="#deletephoto-{{$photo->id}}">Delete</button>
                                                    </div>
                                                </div>

                                                <img class="d-block img-fluid w-100" src="{{asset('/img/photos/'.$store->id.'/'. $photo->file_name)}}" alt="..." style="">
                                                {{--<img class="img-fluid" src="{{asset('/img/photos/'.$store->id.'/'. $photo->file_name)}}">--}}
                                            </div>

                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deletephoto-{{$photo->id}}" tabindex="-1" role="dialog"
                                             aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Photo</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel
                                                        </button>

                                                        <form action="{{route('admin.stores.deletephoto', $photo->id)}}"
                                                              method="post">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_method" value="delete"/>
                                                            <button type="submit" class="btn btn-primary">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <a class="carousel-control-prev" href="#photos-carousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#photos-carousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('script')
    <script>
        $('.carousel').carousel({
            interval: 0
        });

        function openModal(index){
            $('#photos-carousel').carousel(index);
        }


    </script>

@endsection

