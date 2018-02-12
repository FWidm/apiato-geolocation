<?php

namespace App\Containers\GeoLocation\Models;

use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;


class GeoLocation extends Model
{
    protected $table = 'geo_location';

    protected $fillable = [
        'lat',
        'lon',
        'request_timestamp',
        'user_id',
        'participant_id',
        'executed',
    ];

    protected $hidden = [];

    protected $casts = [
        //data->array
//        'request_timestamp' => 'datetime',
//        'lat' => 'double',
//        'lon' => 'double',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'request_timestamp'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function weatherData(){
        return $this->hasMany('App\Containers\WeatherData\Models\WeatherData');
    }
}
