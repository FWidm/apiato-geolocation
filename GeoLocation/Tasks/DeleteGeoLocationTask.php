<?php

namespace App\Containers\GeoLocation\Tasks;

use App\Containers\GeoLocation\Data\Repositories\GeoLocationRepository;
use App\Containers\GeoLocation\Exceptions\GeoLocationNotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\App;

class DeleteGeoLocationTask extends Task
{

    public function __construct()
    {
        // ..
    }

    public function run($id)
    {
        try {
            $geoLoc = App::make(GeoLocationRepository::class)->delete($id);
        } catch (Exception $e) {
            throw new GeoLocationNotFoundException();
        }

        return $geoLoc;
    }
}
