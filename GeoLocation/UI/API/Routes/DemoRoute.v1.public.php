<?php

/**
 * @apiGroup           GeoLocation
 * @apiName            demo
 *
 * @api                {GET} /v1/geodemo Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

$router->post('geoDemo/', [
    'uses'  => 'Controller@demo',
//    'middleware' => [
//      'auth:api',
//    ],
]);
