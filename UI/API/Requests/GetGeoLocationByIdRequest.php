<?php

namespace App\Containers\GeoLocation\UI\API\Requests;

use App\Ship\Parents\Requests\Request;


class GetGeoLocationByIdRequest extends Request
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var  array
     */
    protected $access = [
        'permissions' => '',
        'roles'       => 'admin|researcher',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     *
     * @var  array
     */
    protected $decode = [
         'id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
        'id',
    ];

    /**
     * @return  array
     */
    public function rules()
    {
        return [
            // put your rules here
            // 'name' => 'required|max:
            'id' => 'required|exists:geo_location,id'
        ];
    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        $check = $this->check([
            'hasAccess',
        ]);

        return $check;
    }
}
