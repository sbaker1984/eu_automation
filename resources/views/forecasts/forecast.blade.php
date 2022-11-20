@extends('layouts.app')

@section('content')
    <div class="mt-8 bg-white overflow-hidden sm:rounded-lg">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Temperature (min)</th>
                    <th>Temperature (max)</th>
                    <th>Daytime Weather  <i class="fa-solid fa-house-day"></th>
                    @foreach($forecast->DailyForecasts as $dfc)
                        @if($dfc->Day->HasPrecipitation)
                            <th>Precipitation</th>
                            <th>Intensity</th>
                        @endif
                    @endforeach
                    <th>Nighttime Weather <i class="fa-solid fa-house-night"></i></th>
                    @foreach($forecast->DailyForecasts as $dfc)
                        @if($dfc->Day->HasPrecipitation)
                            <th>Precipitation</th>
                            <th>Intensity</th>
                        @endif
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($forecast->DailyForecasts as $dfc)
                    <tr class="text-center">
                        <td class="p-10 m-10">{{$dfc->Date}}</td>
                        <td class="p-10 m-10">{{$dfc->Temperature->Minimum->Value}}</td>
                        <td class="p-10 m-10">{{$dfc->Temperature->Maximum->Value}}</td>
                        <td class="p-10 m-10">{{$dfc->Day->IconPhrase}}</i>
                            @if($dfc->Day->IconPhrase === 'Sunny') <i class="fa-solid fa-sun"></i>@endif
                            @if($dfc->Day->IconPhrase === 'Partly sunny') <i class="fa-solid fa-cloud-sun"></i> @endif
                        </td>
                        @if($dfc->Day->HasPrecipitation)
                            <td class="p-10 m-10">{{$dfc->Day->PrecipitationType}}</td>
                            <td class="p-10 m-10">{{$dfc->Day->PrecipitationIntensity}}</td>
                        @endif
                        <td class="p-10 m-10">{{$dfc->Night->IconPhrase}}</td>
                        @if($dfc->Night->HasPrecipitation)
                            <td class="p-10 m-10">{{$dfc->Night->PrecipitationType}}</td>
                            <td class="p-10 m-10">{{$dfc->Night->PrecipitationIntensity}}</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
