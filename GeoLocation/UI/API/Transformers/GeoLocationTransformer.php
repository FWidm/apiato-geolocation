<?php

namespace App\Containers\GeoLocation\UI\API\Transformers;

use App\Containers\GeoLocation\Models\GeoLocation;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\WeatherData\UI\API\Transformers\WeatherDataTransformer;
use App\Ship\Parents\Transformers\Transformer;


class GeoLocationTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [
    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [
        'user',
        'weatherData',
    ];

    /**
     * @param GeoLocation $entity
     * @return array
     */
    public function transform(GeoLocation $entity)
    {
        $response = [

            'object' => 'GeoLocation',
            'id' => $entity->getHashedKey(),
            'lat' => $entity->lat,
            'lon' => $entity->lon,
            'request_timestamp' => $entity->request_timestamp,
            'participant_id' => $entity->participant_id,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
        ], $response);

        return $response;
    }

    public function includeUser(GeoLocation $obj)
    {
        return $this->item($obj->user, new UserTransformer());
    }

    public function includeWeatherData(GeoLocation $obj)
    {
        return $this->collection($obj->weatherData, new WeatherDataTransformer());
    }
}
