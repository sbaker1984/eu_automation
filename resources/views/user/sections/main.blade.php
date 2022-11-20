@extends('user.home')

@section('mid_section')
    <div class="card">
        <table class="table table-sm">
            <thead>
            <tr>
                <th>Date</th>
                <th>Temperature (min)</th>
                <th>Temperature (max)</th>
                <th>Daytime Weather  <i class="fa-solid fa-house-day"></th>
                @foreach($flocations->DailyForecasts as $myLocation)
                    @if($myLocation->Day->HasPrecipitation)
                        <th>Precipitation</th>
                        <th>Intensity</th>
                    @endif
                @endforeach
                <th>Nighttime Weather <i class="fa-solid fa-house-night"></i></th>
                @foreach($locations->DailyForecasts as $myLocation)
                    @if($myLocation->Day->HasPrecipitation)
                        <th>Precipitation</th>
                        <th>Intensity</th>
                    @endif
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($locations->DailyForecasts as $myLocation)
                <tr class="text-center">
                    <td class="p-10 m-10">{{$myLocation->Date}}</td>
                    <td class="p-10 m-10">{{$myLocation->Temperature->Minimum->Value}}</td>
                    <td class="p-10 m-10">{{$myLocation->Temperature->Maximum->Value}}</td>
                    <td class="p-10 m-10">{{$myLocation->Day->IconPhrase}}</i>
                        @if($myLocation->Day->IconPhrase === 'Sunny') <i class="fa-solid fa-sun"></i>@endif
                        @if($myLocation->Day->IconPhrase === 'Partly sunny') <i class="fa-solid fa-cloud-sun"></i> @endif
                    </td>
                    @if($myLocation->Day->HasPrecipitation)
                        <td class="p-10 m-10">{{$myLocation->Day->PrecipitationType}}</td>
                        <td class="p-10 m-10">{{$myLocation->Day->PrecipitationIntensity}}</td>
                    @endif
                    <td class="p-10 m-10">{{$myLocation->Night->IconPhrase}}</td>
                    @if($myLocation->Night->HasPrecipitation)
                        <td class="p-10 m-10">{{$myLocation->Night->PrecipitationType}}</td>
                        <td class="p-10 m-10">{{$myLocation->Night->PrecipitationIntensity}}</td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
