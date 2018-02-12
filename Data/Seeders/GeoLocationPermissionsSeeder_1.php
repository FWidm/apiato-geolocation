<?php

namespace App\Containers\GeoLocation\Data\Seeders;

use App\Containers\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder;
use Illuminate\Support\Facades\App;


class GeoLocationPermissionsSeeder_1 extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default Role ----------------------------------------------------------------
        App::make(CreatePermissionTask::class)->run('view-geolocation', 'View Geolocations');
        App::make(CreatePermissionTask::class)->run('delete-geolocation', 'Delete Geolocations');

    }
}
