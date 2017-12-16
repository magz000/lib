@extends('layouts.store.app')

@section('content')

    <section>
        <div class="container p-5">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <h2 class="text-primary">{{$store->name}}</h2>
                    <small>{{$store->address}}</small>

                    <br><br><br>

                    <h4 class="text-primary">
                        Requests to Join
                    </h4>

                    <div class="row justify-content-center">

                    @foreach($store->pending_groupchat as $groupchat)
                        @php
                            $user = $groupchat->user;
                        @endphp

                        <div class="card col-md-10 mt-2 shadow">
                            <div class="card-body">
                                <div class="rounded-circle float-left mr-3 avatar-md"
                                     style="background: url('/img/avatar/{{ ($user->avatar != null ? $user->avatar->link : 'user.png') }}');">
                                </div>
                                <div>
                                    <div class="text-primary lead mb-0">
                                        {{$user->name}}</div>

                                    <small class="text-secondary">
                                        {{$user->email}}
                                    </small>
                                </div>

                                <br>
                                <a class="btn btn-danger text-white pull-right" href="{{route('stores.updaterequest', [$groupchat->id, 2])}}">Decline</a>
                                <a class="btn btn-primary text-white pull-right mx-1" href="{{route('stores.updaterequest', [$groupchat->id, 1])}}">Accept</a>
                            </div>
                        </div>
                    @endforeach

                    </div>

                    <br><br><br>

                    <h4 class="text-primary">
                        Accepted
                    </h4>

                    <div class="row justify-content-center">

                    @foreach($store->accepted_groupchat as $groupchat)
                        @php
                            $user = $groupchat->user;
                        @endphp

                        <div class="card col-md-10 mt-2 shadow">
                            <div class="card-body">
                                <div class="rounded-circle float-left mr-3 avatar-md"
                                     style="background: url('/img/avatar/{{ ($user->avatar != null ? $user->avatar->link : 'user.png') }}');">
                                </div>
                                <div>
                                    <div class="text-primary lead mb-0">
                                        {{$user->name}}</div>

                                    <small class="text-secondary">
                                        {{$user->email}}
                                    </small>
                                </div>

                                <br>
                                <a class="btn btn-danger text-white pull-right" href="{{route('stores.updaterequest', [$groupchat->id, 3])}}">Remove</a>
                            </div>
                        </div>
                    @endforeach

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection



