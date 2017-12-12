@extends('layouts.admin.app')

@section('content')

    <section>
        <div class="container p-5">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card panel-default">
                        <div class="card-heading">Admin Dashboard</div>

                        <div class="card-body">
                            @if(Auth::check())
                            Admin Dashboard {{Auth::user()->type}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



