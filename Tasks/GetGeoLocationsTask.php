<?php

namespace App\Containers\GeoLocation\Tasks;

use App\Containers\GeoLocation\Data\Criterias\OwnerOrAdminCritera;
use App\Containers\GeoLocation\Data\Repositories\GeoLocationRepository;
use App\Ship\Parents\Tasks\Task;


class GetGeoLocationsTask extends Task
{
    private $geoLocRepository;

    public function __construct(GeoLocationRepository $geoLocRepository)
    {
        $this->geoLocRepository=$geoLocRepository;
    }

    public function run()
    {
        return $this->geoLocRepository->paginate();
    }

    public function owned($uid,$hasAccess)
    {
        $this->geoLocRepository->pushCriteria(new OwnerOrAdminCritera($uid,$hasAccess));
    }
}
