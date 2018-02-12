<?php

namespace App\Containers\GeoLocation\Providers;

use Barryvdh\Cors\ServiceProvider;
use FWidm\DWDHourlyCrawler\DWDUtil;


class MainServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //set the php.ini to use the new precision mode source: https://stackoverflow.com/a/43056278/1496040 RFC: https://wiki.php.net/rfc/precise_float_value
        //singleton:
//        $this->app->singleton('FooBar', function($app)
//        {
//            return new DWDUtil();
//        });
        //access:
//        $foobar = App::make('FooBar');
//        var_dump($foobar);
    }

}
