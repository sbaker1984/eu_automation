@extends('user.home')

@section('left-menu')
    <div class="card">
        <div class="card-header">{{$user->name}}</div>
    </div>
@endsection
