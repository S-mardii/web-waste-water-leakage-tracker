<?php

namespace App\Repositories;

use App\PostModel;
use Illuminate\Support\Collection;

/**
 * Class ReportRepository
 *
 * @package App\Repositories
 */
class ReportRepository extends BaseRepository
{
    /**
     * @var ConditionRepository
     */
    protected $conditions;

    /**
     * ReportRepository constructor.
     *
     * @param ConditionRepository $conditions
     */
    public function __construct(ConditionRepository $conditions)
    {
        parent::__construct();

        $this->conditions = $conditions;
    }

    /**
     * @return string
     */
    public function model()
    {
        return PostModel::class;
    }

    /**
     * Find the reports according to a condition name
     *
     * @param string $name
     * @param Collection|null $reports
     *
     * @return $this|Collection|static
     */
    public function getByConditionName(string $name, Collection $reports = null)
    {
        $condition = $this->conditions->findByName($name);

        if ($reports != null) {
            $reports = $reports
                ->where('condition_id', '=', $condition->id);
        } else {
            $reports = $this->model
                ->where('condition_id', '=', $condition->id);
        }

        return $reports;
    }

    /**
     * Search for the reports between dates
     *
     * @param string $from
     * @param string $to
     *
     * @return \Illuminate\Support\Collection
     */
    public function searchBetweenDate(string $from, string $to)
    {
        $reports = $this->model
            ->where('created_at', '>=', $from)
            ->where('created_at', '<=', $to)
            ->get();

        return $reports;
    }
}