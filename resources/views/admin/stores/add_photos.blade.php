@extends('layouts.admin.app')

@section('content')

    <section>
        <div class="container p-5">
            <div class="row justify-content-center">
                <div class="col-md-10 col-md-offset-1">


                    @if(Session::has('upload_failed'))
                        <div class="alert alert-danger ">
                            {{ Session::get('upload_failed') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <a class="btn-primary text-white rounded p-2 pull-right"
                       href="{{ route('admin.stores.show', $store->id) }}"> Back </a>

                    <h1 class="text-primary">Add Photos</h1>

                    <div class="p-5">
                        <h3 class="text-primary">{{$store->name}}</h3>

                        <div class="col-md-12" id="images-holder">
                            {{--<img id="image-holder" alt="..." style="max-width: 75%"/>--}}

                        </div>

                        <form role="form" method="POST" enctype="multipart/form-data"
                              action="{{ route('admin.stores.addphotosprocess', $store->id) }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="_method" value="patch"/>

                            <div class="form-group m-1">
                                <div class="col-md-6 col-md-offset-4">
                                    {{--<label for="cover_image">Cover Image</label>--}}
                                    {{--<input type="file" class="form-control-file" name="cover_image" id="cover_image" onchange="readURL(this)">--}}
                                    <div class="input-file-container">
                                        <input class="input-file" name="photos[]" id="photos" type="file" multiple>
                                        <label tabindex="0" for="photos" class="input-file-trigger">Select a
                                            file</label>
                                    </div>

                                </div>
                            </div>

                            <br><br>
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
    </section>
@endsection


@section('script')
    <script>


        $('#photos').change(function () {

            $('#images-holder').empty();

            if (this.files) {
                var filesAmount = this.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function (event) {
                        $($.parseHTML('<img style="max-width: 100px; margin: 1rem;">')).attr('src', event.target.result).appendTo('#images-holder');
                    }

                    reader.readAsDataURL(this.files[i]);
                }
            }

        });

    </script>

@endsection




