<?php

namespace App\Containers\GeoLocation\UI\API\Controllers;

use App\Containers\GeoLocation\Actions\CreateGeoRequestAction;
use App\Containers\GeoLocation\Actions\DeleteGeoLocationByIDAction;
use App\Containers\GeoLocation\Actions\DemoAction;
use App\Containers\GeoLocation\Actions\GetGeoLocationByIdAction;
use App\Containers\GeoLocation\Actions\GetGeoLocationsAction;
use App\Containers\GeoLocation\UI\API\Requests\CreateGeoLocationRequest;
use App\Containers\GeoLocation\UI\API\Requests\DeleteGeoLocationByIdRequest;
use App\Containers\GeoLocation\UI\API\Requests\DemoRequest;
use App\Containers\GeoLocation\UI\API\Requests\GetGeoLocationByIdRequest;
use App\Containers\GeoLocation\UI\API\Requests\RetrieveAllGeoLocationsRequest;
use App\Containers\GeoLocation\UI\API\Transformers\GeoLocationTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Support\Facades\App;


class Controller extends ApiController
{
    public function demo(DemoRequest $request)
    {
//        dd($request->headers);
        $message = $this->call(DemoAction::class, [$request]);
        return $this->json($message);
    }

    /**
     * List all GeoLocation
     * @param RetrieveAllGeoLocationsRequest $request
     * @return array
     */
    public function index(RetrieveAllGeoLocationsRequest $request)
    {
        $message = $this->call(GetGeoLocationsAction::class);
        return $this->transform($message, GeoLocationTransformer::class);
    }

    /**
     * Show one GeoLocation
     * @param GetGeoLocationByIdRequest $request
     * @return array
     */
    public function show(GetGeoLocationByIdRequest $request)
    {
        $message = $this->call(GetGeoLocationByIdAction::class, [$request]);
        return $this->transform($message, GeoLocationTransformer::class);
    }

    /**
     * Create GeoLocation
     * @param CreateGeoLocationRequest $request
     * @return array
     */
    public function createGeoLocation(CreateGeoLocationRequest $request)
    {
        $message = $this->call(CreateGeoRequestAction::class, [$request]);
        return $this->transform($message, GeoLocationTransformer::class);
    }


    /**
     * Delete GeoLocation
     * @param DeleteGeoLocationByIdRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(DeleteGeoLocationByIdRequest $request)
    {
        $obj = $this->call(DeleteGeoLocationByIDAction::class, [$request]);
        return $this->deleted($obj);
    }
}
