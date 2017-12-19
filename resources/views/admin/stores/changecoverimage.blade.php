@extends('layouts.admin.app')

@section('content')

    <section>
        <div class="container p-5">
            <div class="row justify-content-center">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card panel-default">
                        <div class="card-heading p-2 bg-primary text-white">Edit Store</div>

                        <div class="card-body">
                            <a class="btn-primary text-white rounded p-2 pull-right" href="{{ route('admin.stores.show', $store->id) }}"> Back </a>

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif

                            <img id="image-holder"  alt="..." style="max-width: 75%"/>

                            <form  role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.stores.changecoverimageprocess', $store->id) }}">
                                {{ csrf_field() }}

                                <input type="hidden" name="_method" value="patch" />

                                <div class="form-group">
                                    <label for="cover_image">Cover Image</label>
                                    <input type="file" class="form-control-file" name="cover_image" id="cover_image" onchange="readURL(this)">
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('script')
    <script>
        $('#image-holder').hide();

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image-holder').show();

                    $('#image-holder')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

    @endsection




