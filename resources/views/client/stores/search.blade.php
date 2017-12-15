
@if(sizeof($stores) < 1)


    <p class="text-secondary mt-3">Result is Empty</p>

@endif

@foreach($stores as $store)

    @if($store->distance($latitude, $longitude) < 1)

        <div class="card col-md-10 mt-2 shadow">

            <div class="card-body">
                <a href="{{route('admin.stores.show', $store->id)}}" style="text-decoration:none;">
                    <div class="rounded-circle float-left mr-3"
                         style="background: url('/img/portfolio/cake.png'); background-position:center center; height: 60px; width: 60px; background-size: cover;">
                    </div>


                    <div>
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
    @endif


@endforeach