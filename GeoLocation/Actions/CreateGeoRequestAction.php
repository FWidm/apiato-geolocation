<?php

namespace App\Containers\GeoLocation\Actions;

use App\Containers\Authentication\Tasks\GetAuthenticatedUserTask;
use App\Containers\GeoLocation\Exceptions\GeoLocationNotFoundException;
use App\Containers\GeoLocation\Models\GeoLocation;
use App\Containers\GeoLocation\Tasks\CreateGeoLocationTask;
use App\Containers\GeoLocation\UI\API\Requests\CreateGeoLocationRequest;
use App\Ship\Parents\Actions\Action;


class CreateGeoRequestAction extends Action
{
    public function run(CreateGeoLocationRequest $request)
    {
        $fields = ['data.type', 'data.attributes.lat', 'data.attributes.lon', 'data.attributes.request_timestamp', 'relationships.participant.data.id'];
        $data = $request->sanitizeInput($fields);

        $expectedType = (new \ReflectionClass(GeoLocation::class))->getShortName();

        $uid = $this->call(GetAuthenticatedUserTask::class)->id;
        $participant_id = $data['relationships']['participant']['data']['id'];
        if ($data['data']['type'] != $expectedType)
            throw new GeoLocationNotFoundException("Type of the input has to be set to 'GeoLocation'.");
        try {
            $date = $data['data']['attributes']['request_timestamp'];
        } catch (\Exception $exception) {
            $date = null;
        }
        $var = $this->call(CreateGeoLocationTask::class,
            [$data['data']['attributes']['lat'], $data['data']['attributes']['lon'],
                $date, $uid,$participant_id]
        );

        return $var;
    }
}
