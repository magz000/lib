@extends('layouts.client.app')

@section('content')

    <section>
        <div class="container p-5 h-100">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <h1 class="text-primary">Profile</h1>

                    @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif

                    <br>

                    <div class="rounded-circle mr-3 avatar-lg"
                         style="background: url('/img/avatar/{{ ($user->avatar != null ? $user->avatar->link : 'user.png') }}');">
                    </div>

                    <br>

                    <h5 class="text-secondary">Name: <b>{{$user->name}}</b> </h5>
                    <small class="text-secondary">Email: <b>{{$user->email}}</b></small><br>
                    <small class="text-secondary">Skills: <b>{{$user->skills}}</b></small><br>
                    <small class="text-secondary">Looking For: <b>{{$user->looking_for}}</b></small>


                    <br><br>
                    @if(Auth::user()->id == $user->id)
                        <a class="btn btn-primary" href="{{route('client.profile.edit')}}">Edit Profile</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>

    </script>
@endsection





