<?php

namespace App\Repositories;

use App\Models\Roles;
use App\Repositories\BaseRepository;
use Spatie\Permission\Models\Role;

/**
 * Class RolesRepository
 * @package App\Repositories
 * @version February 15, 2023, 8:33 pm UTC
*/

class RolesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

          'name',
        'guard_name'
        
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Role::class;
    }
}
