<?php

namespace App\Containers\GeoLocation\Actions;

use App\Containers\GeoLocation\Tasks\DeleteGeoLocationTask;
use App\Containers\GeoLocation\Tasks\GetGeoLocationByIdTask;
use App\Ship\Parents\Actions\Action;

class DeleteGeoLocationByIDAction extends Action
{
    public function run($request)
    {
        $id = $request->id;
        $geoLoc = $this->call(GetGeoLocationByIdTask::class, [$id]);

        $this->call(DeleteGeoLocationTask::class, [$id]);

        return $geoLoc;
    }
}
