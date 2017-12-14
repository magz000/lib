
@if(sizeof($stores) < 1)


    <p class="text-secondary mt-3">Result is Empty</p>

@endif

@foreach($stores as $store)

    <div class="card col-md-10 mt-2 shadow">

        <div class="card-body">
            <button class="close" data-toggle="modal" data-target="#delete-{{$store->id}}">
                &times;
            </button>


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
                </div>
            </a>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="delete-{{$store->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Store</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>

                    <form action="{{route('admin.stores.delete', $store->id)}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete" />
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach