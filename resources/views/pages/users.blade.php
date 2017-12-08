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

                                <li class="list-group-item list-user userSelected" id="{{$user->id}}" value="{{$user->id}}" >
                                    <div class="rounded-circle float-left mr-3"
                                         style="background: url('img/portfolio/cake.png'); background-position:center center; height: 60px; width: 60px; background-size: cover;">
                                    </div>

                                    <div class="userName">
                                        <div class="text-primary lead mb-0" id="name{{$user->id}}">
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

                <div class="col-md-5 m-1 card px-0">
                    <div class="card-header bg-primary">
                        <h5 class="text-white mb-0" style="height: 1.5rem;" id="nameUser">    </h5>
                    </div>

                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush" id="message-holder">

                        </ul>
                    </div>

                    <div class="card-footer p-0">
                        <div class="container px-0 ">
                            <div class="row p-1 m-0 ">
                                <input class="col-9 round" id="msg" type="text">
                                <input type="button" class="col-3 text-white bg-primary" id="sendMsg" value="Send">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection









