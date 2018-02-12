<?php

namespace App\Containers\GeoLocation\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class OwnerOrAdminCritera
 * @package App\Containers\GeoLocation\Data\Criterias
 * @author Fabian Widmann <fabian.widmann@gmail.com>
 */
class OwnerOrAdminCritera extends Criteria
{

    /**
     * @var int
     */
    private $userId;
    /**
     * @var boolean
     */
    private $isAdmin;

    /**
     * OwnerOrAdminCriteria constructor.
     * @param null $userId
     * @param bool $isAdmin
     */
    public function __construct($userId = null, $isAdmin=false)
    {
        $this->userId = $userId;
        $this->isAdmin = $isAdmin;
    }

    /**
     * Apply the criteria to the model. If the user is no admin he can only access owned resourced if he is an admin he may access everything.
     * @param $model
     * @param PrettusRepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        if (!$this->userId) {
            $this->userId = Auth::user()->id;
        }

        $retQuery=$model;
        if (!$this->isAdmin)
            $retQuery= $model->where('user_id', '=', $this->userId);

        return $retQuery;

    }

}
