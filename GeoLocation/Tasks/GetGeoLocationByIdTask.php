<?php

namespace App\Containers\GeoLocation\Tasks;

use App\Containers\GeoLocation\Data\Criterias\OwnerOrAdminCritera;
use App\Containers\GeoLocation\Data\Repositories\GeoLocationRepository;
use App\Containers\GeoLocation\Exceptions\GeoLocationNotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;


class GetGeoLocationByIdTask extends Task
{

    private $geoLocRepository;

    public function __construct(GeoLocationRepository $geoLocRepository)
    {
        $this->geoLocRepository=$geoLocRepository;
    }

    public function run($id)
    {
        try {
            $geoLoc = $this->geoLocRepository->find($id);

        } catch (Exception $e) {
            throw new GeoLocationNotFoundException();
        }
        return $geoLoc;
    }

    public function owned($uid,$isAdmin)
    {
        //Log::info("is owned by usr=".$uid."; has access=".$isAdmin);
        $this->geoLocRepository->pushCriteria(new OwnerOrAdminCritera($uid,$isAdmin));
    }
}
