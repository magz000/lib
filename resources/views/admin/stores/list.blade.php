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

                        @foreach($stores as $store)
                            {{--{{$store->name}} <br><br><br>--}}


                            <div class="card col-md-10 mt-2 shadow">
                                <a href="{{route('admin.store.show', $store->id)}}">
                                    <div class="card-body">
                                        <div class="rounded-circle float-left mr-3"
                                             style="background: url('/img/portfolio/cake.png'); background-position:center center; height: 60px; width: 60px; background-size: cover;">
                                        </div>

                                        <div class="userName">
                                            <div class="text-primary lead mb-0" id="name{{$store->id}}">
                                                {{$store->name}}</div>

                                            <small class="text-secondary">
                                                {{$store->address}}
                                            </small>
                                        </div>

                                    </div>

                                </a>
                            </div>



                        @endforeach

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
        $('.alert').click(function(){
            $(this).hide();
        });
    </script>
@endsection



