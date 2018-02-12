<?php

namespace App\Containers\GeoLocation\Tasks;

use App\Containers\GeoLocation\Data\Repositories\GeoLocationRepository;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\App;

class UpdateGeoLocationTask extends Task
{

    public function __construct()
    {
        // ..
    }

    public function run($id, $data)
    {

        $geoRequest = App::make(GeoLocationRepository::class)->update($data, $id);

        return $geoRequest;
    }
}
