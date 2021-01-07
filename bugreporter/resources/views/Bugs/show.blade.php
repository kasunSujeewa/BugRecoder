@extends('Layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 ">
                <div class="card" style="margin-top:100px">
                    <div class="card-header" style="background-color: aqua;">
                        <h1>{{\Str::ucfirst($bug->title)}}</h1>
                    </div>
                    <div class="card-body">
                        <p>{{$bug->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
