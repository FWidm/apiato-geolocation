<?php

namespace App\Containers\GeoLocation\Actions;

use App\Containers\Authentication\Tasks\GetAuthenticatedUserTask;
use App\Containers\GeoLocation\Tasks\GetGeoLocationsTask;
use App\Ship\Parents\Actions\Action;

class GetGeoLocationsAction extends Action
{
    public function run()
    {
        $user = $this->call(GetAuthenticatedUserTask::class);
        $geoLoc = $this->call(GetGeoLocationsTask::class, [],[
            ['owned'=>[$user->id,$user->hasRole('researcher')]]]);
        return $geoLoc;
    }
}
