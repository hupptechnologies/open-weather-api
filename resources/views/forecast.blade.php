{{-- @extends('template') --}}
{{-- @section('content') --}}
{{-- {{dd($forecast->current, $forecast)}} --}}
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
        <h3>Current Weather:
            <span class="text-capitalize" id='current_weather'>{{ $forecast->current->weather[0]->main }}</span>
        </h3>

        <h5 class="mt-4">Weather Description:</h5>
        <p id='weather_description' class="text-capitalize">{{ $forecast->current->weather[0]->description }}</p>

        <h5 class="mt-4">Current Temp
            <span id='current_temp'>{{ round($forecast->current->temp) }} &#176;C</span>
        </h5>
        <h5>Feels like
            <span id='feels_like'>{{ round($forecast->current->feels_like) }} &#176;C</span>
        </h5>

        <h5 class="mt-4">Humidity:
            <span id='humidity'>{{ $forecast->current->humidity }}%</span>
        </h5>
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-secondary">
                    <tr>
                        <th>Hours</th>
                        <th>Weather</th>
                        <th>Temp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($forecast->hourly as $hourly)
						@break($loop->iteration > 24)
                            <tr>
                                <td scope="row">{{ Carbon\Carbon::createFromTimestamp($hourly->dt)->format('h a') }}
                                </td>
                                <td class="text-capitalize">{{ $hourly->weather[0]->description }}</td>
                                <td>{{ round($hourly->temp) }} &#176;C</td>
                            </tr>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-secondary">
                    <tr>
                        <th>Day</th>
                        <th>Weather</th>
                        <th>Temp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($forecast->daily as $daily)
                        <tr>
                            <td scope="row">
                                {{ Carbon\Carbon::createFromTimestamp($daily->dt)->toFormattedDayDateString() }}</td>
                            <td class="text-capitalize">{{ $daily->weather[0]->description }}</td>
                            <td>{{ round($daily->temp->min) }}/{{ round($daily->temp->max) }} &#176;C</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>
</div>
<ul class="nav nav-pills nav-fill mt-4" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="btn btn-link bg-secondary bg-opacity-25" id="pills-home-tab" data-bs-toggle="pill"
            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
            aria-selected="true">Current
            Weather</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="btn btn-link bg-secondary bg-opacity-25" id="pills-profile-tab" data-bs-toggle="pill"
            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
            aria-selected="false">Next 24
            Hours</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="btn btn-link bg-secondary bg-opacity-25" id="pills-contact-tab" data-bs-toggle="pill"
            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
            aria-selected="false">Next 7
            Days</button>
    </li>
</ul>
