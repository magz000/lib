@extends('layouts.client.app')

@section('content')

    <section class="pt-5">
        <div class="">

            @if($store->cover_image != null)
                <div class="cover-image"
                     style="background: url('/img/covers/{{$store->cover_image}}');">
                </div>
            @endif

            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif

            <div class="row p-5 justify-content-center">
                <div class="col-md-10 col-md-offset-1">

                    <h1 class="text-primary">{{$store->name}}</h1>
                    <small>{{$store->address}}</small>

                    @if($store->groupchat->where('user_id', Auth::user()->id)->whereIn('status',[0,1])->count() > 0)
                        @php
                        $groupchat_id = $store->groupchat->where('user_id', Auth::user()->id)->whereIn('status',[0,1])->first()->id;
                        $status = $store->groupchat->where('user_id', Auth::user()->id)->whereIn('status',[0,1])->first()->status;
                        @endphp
                    @else
                        @php
                            $groupchat_id = 0;
                        @endphp
                    @endif


                    <br><br>

                    @if(!$store->user_already_accepted(Auth::user()->id) && !$store->user_already_pending(Auth::user()->id))
                        <a class="btn btn-primary m-1" href="{{route('client.home')}}">Back</a>
                        <a class="btn btn-primary m-1 text-white" data-toggle="modal" data-target="#join-{{$store->id}}">Join</a>
                    @endif

                    @if($store->user_already_pending(Auth::user()->id))
                        <a class="btn btn-danger m-1 text-white" data-toggle="modal" data-target="#cancel-{{$store->id}}">Cancel</a>
                    @elseif($store->user_already_accepted(Auth::user()->id))
                        <a class="btn btn-danger m-1 text-white" data-toggle="modal" data-target="#leave-{{$store->id}}">Leave</a>
                        <a class="btn btn-primary m-1 text-white" href="{{route('client.stores.groupchat', $store->id)}}">Open Groupchat</a>
                    @endif


                    <br><br>
                    <br><br>

                    <h4 class="text-primary">Photos
                        <a class="btn-primary-white m-1" href="{{route('admin.stores.addphotos', $store->id)}}"><i class="fa fa-plus"></i></a>
                    </h4>

                    <div class="row">

                        @foreach($store->photo as $key=>$photo)
                            <div onclick="openModal({{$key}})" class="m-1 p-1" data-toggle="modal" data-target="#view_image" style="background: url({{asset('/img/photos/'.$store->id.'/'. $photo->file_name)}}); width: 120px; height: 80px; background-position: center center !important;
                                    background-size: cover !important;">
                            </div>


                        @endforeach

                    </div>
                    {{--<br><br>--}}

                    {{--@if($store->user_already_accepted(Auth::user()->id))--}}


                    {{--<div class="row">--}}

                    {{--<div class="col-md-6 card p-0">--}}
                        {{--<div class="card-header bg-primary align-content-center">--}}
                            {{--<h5 class="text-white mb-0"> Users </h5>--}}
                        {{--</div>--}}

                        {{--<div class="card-body p-0  card-scroll" style="height: 30rem">--}}
                            {{--<ul class="list-group list-group-flush">--}}

                                {{--<li class="list-group-item list-user group-selected" id="groupChat"--}}
                                    {{--value="{{$store->id}}">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="rounded-circle float-left mr-3 avatar-md"--}}
                                             {{--style="background: url('/img/portfolio/cake.png');">--}}
                                        {{--</div>--}}

                                        {{--<div>--}}
                                            {{--<span class="text-primary lead mb-0">--}}
                                                {{--{{$store->name}}</span>--}}
                                            {{--<br>--}}
                                            {{--<small class="text-secondary">--}}
                                                {{--Group Chat--}}
                                            {{--</small>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}

                                {{--@foreach($store->getGroupchatWithStatus(1) as $groupchat)--}}

                                    {{--@php--}}
                                        {{--$user = $groupchat->user;--}}
                                    {{--@endphp--}}

                                    {{--@if($user->id != Auth::user()->id)--}}
                                        {{--<li class="list-group-item list-user userSelected" id="{{$user->id}}"--}}
                                            {{--value="{{$user->id}}">--}}
                                            {{--<div class="row">--}}
                                                {{--<div class="rounded-circle float-left mr-3 avatar-md"--}}
                                                     {{--style="background: url('/img/avatar/{{ ($user->avatar != null ? $user->avatar->link : 'user.png') }}'); ">--}}
                                                {{--</div>--}}

                                                {{--<div class="userName">--}}

                                                    {{--<span class="text-primary lead mb-0" id="name{{$user->id}}">--}}
                                                        {{--{{$user->name}}</span>--}}

                                                    {{--<br>--}}
                                                    {{--<small class="text-secondary">--}}
                                                        {{--{{$user->email}}--}}
                                                    {{--</small><br>--}}

                                                    {{--@if($user->skills != null)--}}
                                                        {{--<small class="text-secondary">--}}
                                                            {{--Skills: {{$user->skills}}--}}
                                                        {{--</small><br>--}}
                                                    {{--@endif--}}


                                                    {{--@if($user->looking_for != null)--}}
                                                        {{--<small class="text-secondary">--}}
                                                            {{--Looking for: {{$user->looking_for}}--}}
                                                        {{--</small><br>--}}
                                                    {{--@endif--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                    {{--@endif--}}

                                {{--@endforeach--}}

                            {{--</ul>--}}

                        {{--</div>--}}

                    {{--</div>--}}

                    {{--<div class="col-md-6 card px-0" >--}}
                        {{--<div class="card-header bg-primary" >--}}
                            {{--<h5 class="text-white mb-0" style="height: 1.5rem;" id="nameUser">    </h5>--}}
                        {{--</div>--}}

                        {{--<div class="card-body p-0 card-scroll" id="chat-body" style="height: 30rem">--}}
                            {{--<ul class="list-group list-group-flush" id="message-holder">--}}

                            {{--</ul>--}}
                        {{--</div>--}}

                        {{--<div class="card-footer p-0">--}}
                            {{--<div class="container px-0 ">--}}
                                {{--<div class="row p-1 m-0 ">--}}
                                    {{--<input class="col-9 round " id="msg">--}}
                                    {{--<input type="button" class="col-3 text-white btn-primary btn" id="sendMsg" value="Send">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--</div>--}}
                    {{--@endif--}}
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="join-{{$store->id}}" tabindex="-1" role="dialog"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Join Group Chat</h5>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to join?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel
                        </button>

                        <form action="{{route('client.stores.join', [Auth::user()->id, $store->id])}}" method="post">
                            {{ csrf_field() }}
                            <button class="btn btn-primary">Confirm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="leave-{{$store->id}}" tabindex="-1" role="dialog"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Leave Group Chat</h5>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to leave the group chat?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel
                        </button>

                        <form action="{{route('client.updaterequest', [$groupchat_id, 5])}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="patch" />
                            <button class="btn btn-primary">Confirm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="cancel-{{$store->id}}" tabindex="-1" role="dialog"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cancel Request</h5>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to cancel your request to join the groupchat?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel
                        </button>

                        <form action="{{route('client.updaterequest', [$groupchat_id, 4])}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="patch" />
                            <button class="btn btn-primary">Confirm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="view_image" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="">

                <div class="modal-content" style="">
                    <div id="photos-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">

                            @foreach($store->photo as $key=>$photo)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">

                                    <div class="d-block mx-auto position-relative" >
                                        <div class="image-view d-flex position-absolute h-100 w-100" >
                                            <div class="image-view-option-top">
                                                {{--<i class="fa fa-search-plus fa-3x"></i>--}}
                                                <small>{{$photo->file_name}}</small>

                                            </div>


                                            <div class="image-view-option-bottom" >
                                                <button class="close2" data-toggle="modal" data-target="#deletephoto-{{$photo->id}}">Delete</button>
                                            </div>
                                        </div>

                                        <img class="d-block img-fluid w-100" src="{{asset('/img/photos/'.$store->id.'/'. $photo->file_name)}}" alt="..." style="">
                                        {{--<img class="img-fluid" src="{{asset('/img/photos/'.$store->id.'/'. $photo->file_name)}}">--}}
                                    </div>

                                </div>


                            @endforeach
                        </div>

                        <a class="carousel-control-prev" href="#photos-carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#photos-carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')

    <script>
        $('.carousel').carousel({
            interval: 0
        });

        function openModal(index){
            $('#photos-carousel').carousel(index);
        }
    </script>

    {{--<script>--}}
        {{--var userSelected;--}}
        {{--var channel;--}}

        {{--var msgs;--}}


        {{--var currUser = '{{ Auth::user()->id }}';--}}
        {{--var userName = '{{ Auth::user()->name }}';--}}


        {{--//Chat function--}}

        {{--$(document).ready(function(){--}}
            {{--$('#groupChat').trigger('click')--}}
        {{--});--}}

        {{--$('#groupChat').click(function(){--}}
            {{--//console.log('test');--}}

            {{--if(msgs != null)--}}
            {{--msgs.off();--}}

            {{--$('#message-holder').empty();--}}


            {{--$('.userSelected').css('background-color', '#fff');--}}

            {{--$(this).css('background-color', '#dadada');--}}

            {{--$('#nameUser').text('{{$store->name}} (Group Chat)');--}}

            {{--channel = {{$store->id}} + "---isauj23ds";--}}

            {{--userSelected = '{{$store->id}}';--}}

            {{--msgs = firebase.database().ref('channel/' + channel +'/messages');--}}

            {{--msgs.on('child_added', function(snapshot){--}}
                {{--var data = snapshot.val();--}}

                {{--$('#message-holder').append('<li class="list-group-item list-chat">   '--}}
                    {{--+ '<span style="font-size: .6rem;" class="text-secondary ' + (data.from == currUser ? 'pull-right' : '') + '">' + data.name + '</span><br>'--}}
                    {{--+ '<div class="' + (data.from == currUser ? 'chat-from-me pull-right' : 'chat-to-me') + '" style="display:inline-block;width:auto; max-width: 75%;">'--}}
                    {{--+ data.message--}}
                    {{--+ '</div>' +--}}
                    {{--'</li> ');--}}

                {{--$('#chat-body').animate({scrollTop: $('#chat-body').prop('scrollHeight')});--}}
            {{--});--}}

        {{--});--}}

        {{--$('.userSelected').click(function () {--}}

            {{--if(msgs != null)--}}
            {{--msgs.off();--}}

            {{--$('#message-holder').empty();--}}

            {{--userSelected = $(this).val();--}}

            {{--$('.userSelected, #groupChat').css('background-color', '#fff');--}}

            {{--$(this).css('background-color', '#dadada');--}}

            {{--var name = $('#name' + userSelected).text();--}}

            {{--$('#nameUser').text(name);--}}

            {{--if(currUser < userSelected){--}}
                {{--channel = currUser + "--a7dnwi--" + userSelected;--}}
            {{--}else{--}}
                {{--channel = userSelected + "--a7dnwi--" + currUser;--}}
            {{--}--}}

            {{--msgs = firebase.database().ref('channel/' + channel +'/messages');--}}

            {{--msgs.on('child_added', function(snapshot){--}}
                {{--var data = snapshot.val();--}}

                {{--$('#message-holder').append('<li class="list-group-item list-chat">   '--}}
                    {{--+ '<span style="font-size: .6rem;" class="text-secondary ' + (data.from == currUser ? 'pull-right' : '') + '">' + data.name + '</span><br>'--}}
                    {{--+ '<div class="' + (data.from == currUser ? 'chat-from-me pull-right' : 'chat-to-me') + '" style="display:inline-block;width:auto;">'--}}
                    {{--+ data.message--}}
                    {{--+ '</div>' +--}}
                    {{--'</li> ');--}}

                {{--$('#chat-body').scrollTop($("#mydiv")[0].scrollHeight);--}}
            {{--});--}}


        {{--});--}}

        {{--$('#sendMsg').click(function () {--}}
            {{--var message = $('#msg').val();--}}

            {{--if (message != '') {--}}
                {{--firebase.database().ref('channel/' + channel + '/messages').push({--}}
                    {{--from: currUser,--}}
                    {{--user: userSelected,--}}
                    {{--name: userName,--}}
                    {{--message: message,--}}
                    {{--timestamp: $.now()--}}
                {{--});--}}

                {{--$('#msg').val('');--}}
            {{--}--}}

        {{--});--}}

        {{--$(document).on('keypress', '#msg', function (e) {--}}
            {{--switch (e.keyCode) {--}}
                {{--case 13 :--}}
                    {{--$('#sendMsg').trigger('click')--}}
                    {{--break;--}}
            {{--}--}}
        {{--});--}}



        {{--@if($groupchat_id != 0)--}}
            {{--setInterval(function(){--}}
                {{--$.ajax({--}}
                    {{--url: "{{route('client.groupchat.status', $groupchat_id)}}",--}}
                    {{--type: "GET",--}}
                    {{--dataType: "html",--}}
                    {{--success: function(data){--}}
                        {{--if(data != {{$status}}){--}}
                            {{--window.location.reload(true);--}}
                        {{--}--}}
                        {{--//$('#pending-container').html(data);--}}
                    {{--}--}}
                {{--});--}}

            {{--}, 1000);--}}

        {{--@endif--}}



    {{--</script>--}}

@endsection

