@extends('layouts.store.app')

@section('content')

    <section>
        <div class="container p-5">
            <div class="row justify-content-center">
                <div class="col-md-10 col-md-offset-1">

                    <h2 class="text-primary">{{$store->name}}</h2>
                    <small>{{$store->address}}</small>


                </div>
            </div>
        </div>
    </section>
@endsection



