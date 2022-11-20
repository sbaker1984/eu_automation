@extends('user.home')

@section('favourites')
    <div class="card-header">Favourites</div>

        <div class="card-body">
            @foreach($favourites as $favourite)
                <div class="alert alert-success" role="alert">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th><i class="fa-solid fa-house-day"></i></th>
                            @foreach($forecast->DailyForecasts as $dfc)
                                @if($dfc->Day->HasPrecipitation)
                                    <th>Precipitation</th>
                                    <th>Intensity</th>
                                @endif
                            @endforeach
                            <th><i class="fa-solid fa-house-night"></i></th>
                            @foreach($favourite->DailyForecasts as $dfc)
                                @if($dfc->Day->HasPrecipitation)
                                    <th>Precipitation</th>
                                    <th>Intensity</th>
                                @endif
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($favourte->DailyForecasts as $dfc)
                            <tr class="text-center">
                                <td class="p-10 m-10">{{$dfc->Date}}</td>
                                <td class="p-10 m-10">{{$dfc->Day->IconPhrase}}
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
                                <td class="p-10 m-10"><a href="/api/forecast/{{$location->Key}}">Show Full Forecast</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
@endsection
