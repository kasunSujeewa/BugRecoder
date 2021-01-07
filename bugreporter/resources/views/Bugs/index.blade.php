@extends('Layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center" style="background-color: brown">
                       <bug-adding-header/>
                    </div>
                    <div class="card-body" style="background-color: rgb(127, 209, 175);">
                        <bug-table/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
