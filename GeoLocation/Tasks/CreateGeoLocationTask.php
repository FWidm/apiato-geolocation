<?php

namespace App\Containers\GeoLocation\Tasks;

use App\Containers\GeoLocation\Data\Repositories\GeoLocationRepository;
use App\Ship\Parents\Tasks\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;


class CreateGeoLocationTask extends Task
{

    public function __construct()
    {
        // ..
    }

    public function run($lat, $lon, $date, $uid,$participant_id)
    {
        if (!isset($date))
            $date=Carbon::now();
        else
            $date=Carbon::parse($date);

        $geoRequest=null;
        $geoRequest = App::make(GeoLocationRepository::class)->create([
            'lat'     => $lat,
            'lon'     => $lon,
            'request_timestamp'    => $date,
            'user_id' => $uid,
            'participant_id' => $participant_id,
        ]);


        return $geoRequest;
    }
}
