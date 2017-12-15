@extends('layouts.client.app')

@section('content')

    <section>
        <div class="container p-5 h-100">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <h1 class="text-primary">Profile</h1>



                    <h5 class="text-secondary">Name: {{Auth::user()->name}} </h5>


                    <small class="text-secondary">Email: {{Auth::user()->email}}</small>

                </div>
            </div>
        </div>
    </section>
@endsection





