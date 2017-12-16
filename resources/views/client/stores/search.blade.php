
@if(sizeof($stores) < 1)


    <p class="text-secondary mt-3">Result is Empty</p>

@endif

@foreach($stores as $store)

    @if($store->distance($latitude, $longitude) < 1)

        <div class="card col-md-10 mt-2 shadow">

            <div class="card-body">
                <a href="{{route('client.stores.show', $store->id)}}"  style="text-decoration:none;">
                    <div class="rounded-circle float-left mr-3"
                         style="background: url('/img/portfolio/cake.png'); background-position:center center; height: 60px; width: 60px; background-size: cover;">
                    </div>
                        <div class="text-primary lead mb-0" id="name{{$store->id}}">
                            {{$store->name}}</div>

                        <small class="text-secondary">
                            {{$store->address}}
                        </small>
                        <br>
                        <small class="text-secondary">
                            Distance: {{round($store->distance($latitude, $longitude), 2)}} km
                        </small>
                    </div>
                </a>

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

    @endif


@endforeach