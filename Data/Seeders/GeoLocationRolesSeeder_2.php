<?php

namespace App\Containers\GeoLocation\Data\Seeders;

use App\Containers\Authorization\Tasks\CreateRoleTask;
use App\Ship\Parents\Seeders\Seeder;
use Illuminate\Support\Facades\App;


class GeoLocationRolesSeeder_2 extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default Role ----------------------------------------------------------------

        // give the super admin all the available permissions, while seeding
        App::make(CreateRoleTask::class)->run('researcher', 'Researcher')->givePermissionTo(
//            App::make(ListAllPermissionsTask::class)->run()->pluck('name')->toArray()
            'delete-geolocation','view-geolocation'
        );

    }
}
