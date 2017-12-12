@extends('layouts.admin.app')

@section('content')

    <section>
        <div class="container p-5 h-100">
            <div class="row justify-content-center">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card panel-default">
                        <div class="card-heading p-2 bg-primary text-white">Stores</div>

                        <div class="card-body">

                            <a class="btn-primary text-white rounded p-2 pull-right" href="{{url('admin/stores/add')}}"> Add Store </a>


                            @foreach($stores as $store)
                                {{$store->name}} <br><br><br>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



