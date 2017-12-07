@extends('layouts.app')

@section('content')

    <section>
        <div class="container p-3 h-100">
            <div class="row justify-content-center h-100">
                <div class="col-md-5 m-1 card p-0">
                    <div class="card-header bg-primary align-content-center">
                        <h5 class="text-white mb-0"> Users </h5>
                    </div>

                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">

                            @foreach($users as $user)

                                <li class="list-group-item list-user">
                                    <div class="rounded-circle float-left mr-3"
                                         style="background: url('img/portfolio/cake.png'); background-position:center center; height: 60px; width: 60px; background-size: cover;">
                                    </div>

                                    <div class="">
                                        <div class="text-primary lead mb-0">
                                            {{$user->name}}
                                        </div>

                                        <small class="text-secondary">
                                            {{$user->email}}
                                        </small>
                                    </div>
                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

                <div class="col-md-5 m-1 card">

                </div>
            </div>
        </div>
    </section>
@endsection



