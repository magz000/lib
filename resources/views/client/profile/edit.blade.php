@extends('layouts.client.app')

@section('content')

    <section>
        <div class="container p-5 h-100">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <h1 class="text-primary">Edit Profile</h1>

                    <a class="btn btn-primary text-white pull-right" href="{{ route('client.profile', $user->id) }}"> Back </a>


                    <a data-toggle="modal" data-target="#avatar">
                        <div id="avatar_pic" class="rounded-circle mr-3 avatar-lg"
                             style="background: url('/img/avatar/{{ ($user->avatar != null ? $user->avatar->link : 'user.png') }}'); ">
                        </div>
                    </a>

                    <br>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#avatar">Change Avatar</button>

                    <br><br>

                    <form  role="form" method="POST" action="{{ route('client.profile.editprocess', $user->id) }}">
                        {{ csrf_field() }}

                        <input type="hidden" id="avatar_id" name="avatar_id" value="{{$user->avatar_id}}"/>

                        <input type="hidden" name="_method" value="patch" />

                        <div class="form-group">
                            <label for="name" class="col-md-6 control-label text-secondary">Name</label>

                            <div class="col-lg-12 col-md-8">
                                <input id="name"  class="form-control" name="name"
                                       value="{{$user->name}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="skills" class="col-md-6 control-label text-secondary">Skills</label>

                            <div class="col-lg-12 col-md-8">
                                <input id="skills"  class="form-control" name="skills"
                                       value="{{$user->skills}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="looking_for" class="col-md-6 control-label text-secondary">Looking for</label>

                            <div class="col-lg-12 col-md-8">
                                <input id="looking_for"  class="form-control" name="looking_for"
                                       value="{{$user->looking_for}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>

                    <br><br>

                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="avatar" tabindex="-1" role="dialog"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Change Avatar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                        @foreach($avatars as $avatar)
                            <div class="rounded-circle m-3 avatar-md"
                                 style="background: url('/img/avatar/{{ $avatar->link }}');">
                                <input id="selected_avatar_id" type="hidden" value="{{$avatar->id}}">
                                <input id="selected_avatar_link" type="hidden" value="{{$avatar->link}}">
                            </div>
                        @endforeach

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $('.avatar-md').click(function(){
            console.log($(this).val());

            $('#avatar_id').val($(this).find('#selected_avatar_id').val());

            $('#avatar_pic').css('background', 'url("/img/avatar/' + $(this).find('#selected_avatar_link').val() + '")');

            $('#avatar').modal('toggle');
        });
    </script>
@endsection






