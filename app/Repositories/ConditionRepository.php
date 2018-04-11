<?php

namespace App\Repositories;

use App\ConditionModel;

/**
 * Class ConditionRepository
 *
 * @package App\Repositories
 */
class ConditionRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return ConditionModel::class;
    }

    /**
     * @param string $name
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function findByName(string $name)
    {
        $condition = $this->getByColumn($name, 'condition');

        return $condition;
    }
}