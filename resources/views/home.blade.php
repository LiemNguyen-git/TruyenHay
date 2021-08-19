@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hello Admin</div>

                <img src="{{ url('public/uploads/truyen/Doraemon52.jpg') }}" alt="" srcset="">



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
