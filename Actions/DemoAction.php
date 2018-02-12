<?php

namespace App\Containers\GeoLocation\Actions;


use Apiato\Core\Traits\HashIdTrait;
use App\Containers\GeoLocation\UI\API\Requests\DemoRequest;
use App\Containers\User\Data\Repositories\UserRepository;
use App\Containers\WeatherData\Data\Criterias\DemoCriteria;
use App\Containers\WeatherData\Data\Repositories\WeatherDataRepository;
use App\Ship\Criterias\Eloquent\CountCriteria;
use App\Ship\Criterias\Eloquent\NotNullCriteria;
use App\Ship\Criterias\Eloquent\ThisEqualThatCriteria;
use App\Ship\Parents\Actions\Action;
use Olifolkerd\Convertor\Convertor;


class DemoAction extends Action
{
    use HashIdTrait;

    private $rep;

    public function __construct(WeatherDataRepository $repository)
    {
        $this->rep = $repository;
    }

    public function run(DemoRequest $request)
    {
        $units=["C","hPA","K","min","mm","Pa","kg m**-2"];
        $ret=[];
        $conv=new Convertor(null,null);
        foreach ($units as $unit) {
            $ret[mb_strtolower($unit)]=$conv->getUnits(mb_strtolower($unit));
        }

        return $ret;

    }
}
