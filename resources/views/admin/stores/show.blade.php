@extends('layouts.admin.app')

@section('content')

    <section>
        <div class="container p-5">

            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif

            <div class="row justify-content-center">


                <div class="col-md-5 col-md-offset-1">


                    <h1 class="text-primary">{{$store->name}}</h1>
                    <small>{{$store->address}}</small>

                    <br><br>
                    <a class="btn btn-primary m-1" href="{{route('admin.stores')}}">Back</a>
                    <a class="btn btn-primary m-1" href="{{route('admin.stores.edit', $store->id)}}">Edit</a>
                    <a class="btn btn-primary m-1" href="{{route('admin.stores.addemployee', $store->id)}}">Add Employee</a>

                    <br><br>
                    <br><br>

                </div>

                <div class="col-md-5 col-md-offset-1">

                    <h3 class="text-primary">Employees</h3>

                    <div class="row justify-content-center">
                        @foreach($employees as $employee)

                            <div class="card col-md-10 mt-2 shadow">

                                <div class="card-body">
                                    <button class="close" data-toggle="modal" data-target="#delete-{{$employee->id}}">
                                        &times;
                                    </button>


                                    {{--<a href="{{route('admin.stores.show', $employee->id)}}"--}}
                                       {{--style="text-decoration:none;">--}}
                                        <div class="rounded-circle float-left mr-3"
                                             style="background: url('/img/portfolio/cake.png'); background-position:center center; height: 60px; width: 60px; background-size: cover;">
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
                                            <h5 class="modal-title">Delete Store</h5>
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
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script>
        $('.alert').click(function () {
            $(this).hide();
        });
    </script>

@endsection

