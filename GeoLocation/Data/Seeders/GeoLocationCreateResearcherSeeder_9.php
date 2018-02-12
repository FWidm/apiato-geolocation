<?php

namespace App\Containers\GeoLocation\Data\Seeders;

use App\Containers\Authorization\Tasks\GetRoleTask;
use App\Containers\User\Models\User;
use App\Ship\Parents\Seeders\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class GeoLocationCreateResearcherSeeder_9 extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default Users ----------------------------------------------------------------

        $admin = new User();
        $admin->name = 'Super Researcher';
        $admin->email = 'researcher@researcher.com';
        $admin->password = Hash::make('researcher');
        $admin->save();
        $admin->assignRole(App::make(GetRoleTask::class)->run('researcher'));

        // ...

    }
}
