@extends('layouts.public.app')

@section('content')

    <section>
        <div class="container p-5">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Dashboard</div>

                        <div class="panel-body">
                            You are logged in! - {{Auth::user()->type}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


