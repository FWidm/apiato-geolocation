<?php

namespace App\Containers\GeoLocation\Actions;

use App\Containers\Authentication\Tasks\GetAuthenticatedUserTask;
use App\Containers\GeoLocation\Exceptions\GeoLocationNotFoundException;
use App\Containers\GeoLocation\Tasks\GetGeoLocationByIdTask;
use App\Containers\GeoLocation\UI\API\Requests\GetGeoLocationByIdRequest;
use App\Ship\Parents\Actions\Action;


class GetGeoLocationByIdAction extends Action
{
    public function run(GetGeoLocationByIdRequest $request)
    {
        $id = $request->id;
        $user = $this->call(GetAuthenticatedUserTask::class);
        $geoLoc = $this->call(GetGeoLocationByIdTask::class, [$id],[
            ['owned'=>[$user->id,($user->hasRole('admin')||$user->hasRole('researcher'))]]]);

        if (!$geoLoc) {
            throw new GeoLocationNotFoundException();
        }

        return $geoLoc;
    }
}
