<?php

namespace App\Containers\GeoLocation\UI\API\Transformers;

use App\Containers\GeoLocation\Models\GeoLocation;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\WeatherData\UI\API\Transformers\WeatherDataTransformer;
use App\Ship\Parents\Transformers\Transformer;


class GeoLocationToParticipantTransformer extends Transformer
{

    /**
     * @param GeoLocation $entity
     * @return array
     */
    public function transform(GeoLocation $entity)
    {
        $response = [
            'object' => 'Participant',
            'id' => $entity->participant_id,
        ];

        return $response;
    }

}
