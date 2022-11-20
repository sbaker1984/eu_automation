@extends('layouts.app')

@section('content')
    <div class="mt-8 bg-white overflow-hidden sm:rounded-lg">
        <table class="table table-sm">
            <thead>
                <tr class="text-center">
                    <th>Name</th>
                    <th>Code</th>
                    <th>City</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                </tr>
            </thead>
            <tbody>
                @foreach($locations as $location)
                    <tr class="text-center">
                        <td class="p-10 m-10">{{$location->Country->EnglishName}}</td>
                        <td class="p-10 m-10">{{$location->TimeZone->Code}}</td>
                        <td class="p-10 m-10">{{$location->LocalizedName}}</td>
                        <td class="p-10 m-10">{{$location->GeoPosition->Latitude}}</td>
                        <td class="p-10 m-10">{{$location->GeoPosition->Longitude}}</td>
                        <td class="p-10 m-10"><a href="/api/forecast/{{$location->Key}}">5 Day Forecast</a></td>
                        <td class="p-10 m-10"><a href="addFavourite/{{$location->TimeZone->Code}}"><i class="fa-solid fa-star"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

