<?php

namespace App\Repositories;

use App\Models\Permissions;
use App\Repositories\BaseRepository;

/**
 * Class PermissionsRepository
 * @package App\Repositories
 * @version February 15, 2023, 8:33 pm UTC
*/

class PermissionsRepository extends BaseRepository
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
        return Permissions::class;
    }
}
