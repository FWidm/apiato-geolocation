<?php

namespace App\Containers\GeoLocation\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class GeoRequestModelRepository
 */
class GeoLocationRepository extends Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'lat'    => '=',
        'lon'    => '=',
        'user_id' => '=',
        'request_timestamp'  => 'like',
        'participant_id' => '=',
    ];

    public function boot()
    {
		parent::boot();
        // probably do some stuff here ...
    }
}
