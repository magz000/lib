@extends('layouts.admin.app')

@section('content')

    <section>
        <div class="container p-5 h-100">
            <div class="row justify-content-center">
                <div class="col-md-10 col-md-offset-1">

                    <h1 class="text-primary">Stores</h1>



                    <a class="btn-primary text-white rounded p-2 pull-right" href="{{url('admin/stores/add')}}"> Add
                        Store </a>

                    <br><br>

                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif



                    {{ $stores->links() }}

                    <div class="row justify-content-center">

                        <input type="text" class="form-control col-md-8" placeholder="Search" name="query" id="query" />
                        <br><br>

                        <div class="row justify-content-center w-100" id="search-container">


                        </div>

                        <div class="row justify-content-center w-100" id="store-container">

                            @foreach($stores as $store)

                                <div class="card col-md-10 mt-2 shadow">

                                    <div class="card-body">
                                        <button class="close" data-toggle="modal" data-target="#delete-{{$store->id}}">
                                            &times;
                                        </button>


                                        <a href="{{route('admin.stores.show', $store->id)}}"
                                           style="text-decoration:none;">
                                            <div class="rounded-circle float-left mr-3"
                                                 style="background: url('/img/portfolio/cake.png'); background-position:center center; height: 60px; width: 60px; background-size: cover;">
                                            </div>


                                            <div>
                                                <div class="text-primary lead mb-0" id="name{{$store->id}}">
                                                    {{$store->name}}</div>

                                                <small class="text-secondary">
                                                    {{$store->address}}
                                                </small>
                                            </div>
                                        </a>

                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="delete-{{$store->id}}" tabindex="-1" role="dialog"
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

                                                <form action="{{route('admin.stores.delete', $store->id)}}"
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

                    <br>

                    {{ $stores->links() }}


                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $('#search-container').hide();

        $('.alert').click(function(){
            $(this).hide();
        });


        $('#query').keyup(function(){
            var query = $(this).val();

            if(query.length > 0 ){
                $('#search-container').show();
                $('#store-container').hide();

                $('.pagination').hide();

                $.ajax({
                    url: "{{route('admin.stores.search')}}",
                    type: "GET",
                    data: {q : query},
                    dataType: "html",
                    success: function(data){
                        $('#search-container').html(data);
                    }
                });
            }else{
                $('#search-container').hide();
                $('#store-container').show();

                $('.pagination').show();
            }


        });
    </script>
@endsection



