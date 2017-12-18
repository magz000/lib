@foreach($store->accepted_groupchat as $groupchat)
    @php
        $user = $groupchat->user;
    @endphp

    <div class="card col-md-10 mt-2 shadow">
        <div class="card-body">
            <div class="row">
                <div class="rounded-circle mr-3 avatar-md"
                     style="background: url('/img/avatar/{{ ($user->avatar != null ? $user->avatar->link : 'user.png') }}');">
                </div>
                <div>
                    <div class="text-primary lead mb-0">
                        {{$user->name}}</div>

                    <small class="text-secondary">
                        {{$user->email}}
                    </small><br>


                    @if($user->skills != null)
                        <small class="text-secondary">
                            Skills: {{$user->skills}}
                        </small><br>
                    @endif


                    @if($user->looking_for != null)
                        <small class="text-secondary">
                            Looking for: {{$user->looking_for}}
                        </small><br>
                    @endif
                </div>
            </div>

            <br>
            <a class="btn btn-danger text-white pull-right" href="{{route('stores.updaterequest', [$groupchat->id, 3])}}">Remove</a>
        </div>
    </div>
@endforeach