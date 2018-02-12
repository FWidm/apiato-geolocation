<?php

/**
 * @apiGroup           GeoLocation
 * @apiName            create GeoLocation Object
 *
 * @api                {POST} /v1/geolocation Create a GeoLocationRequest
 * @apiDescription     Allows creation of GeoLocationrequests, those requests log the user's latitude and longitude as well as a timestamp.
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {float}  lat latitude of the request
 * @apiParam           {float}  lon longitude of the request
 * @apiParam           {date}  [request_timestamp] optional timestamp of the request, default value is the time when the resource is created!
 *
 * @apiUse             GeoLocationSingleResponse
 */

$router->post('geo-location', [
    'uses'  => 'Controller@createGeoLocation',
    'middleware' => [
        'auth:api',
    ],
]);
