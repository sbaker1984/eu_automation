@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @yield('left_section')
        </div>

        <div class="col-md-7">
            @yield('mid_section')
        </div>


        <div class="col-md-3">
            <div class="card">
                @yield('favourites')
            </div>
        </div>
    </div>
</div>
@endsection
