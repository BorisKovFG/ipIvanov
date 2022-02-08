<?php

namespace App\Http\Filters\Admin;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;
use function PHPUnit\Framework\matches;

class ClientFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const AGREEMENT_DATE = 'agreement_date';
    public const DELIVERY_COST = 'delivery_cost';
    public const REGION = 'region';
    public const STATUS = 'status';
    public const SORT = 'sort';


    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::AGREEMENT_DATE => [$this, 'agreementDate'],
            self::DELIVERY_COST => [$this, 'deliveryCost'],
            self::REGION => [$this, 'region'],
            self::STATUS => [$this, 'status'],
            self::SORT => [$this, 'sort'],

        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function agreementDate(Builder $builder, $value)
    {
        $builder->whereBetween('agreement_date', [$value['begin'], $value['end']]);
    }

    public function deliveryCost(Builder $builder, $value)
    {
        $builder->whereBetween('delivery_cost', [$value['begin'], $value['end']]);
    }

    public function region(Builder $builder, $value)
    {
        $builder->where('region', 'like', "%{$value}%");
    }

    public function status(Builder $builder, $value)
    {
        if ($value === 'deleted') {
            $builder->onlyTrashed();
        }
    }

    public function sort(Builder $builder, $value)
    {
        //match() only since php 8.0
        switch ($value) {
            case 'nameDesc':
                $builder->orderBy('name', 'desc');
                break;
            case 'nameAsc':
                $builder->orderBy('name', 'asc');
                break;
            case 'deliveryCostDesc':
                $builder->orderBy('delivery_cost', 'desc');
                break;
            case 'deliveryCostAsc':
                $builder->orderBy('delivery_cost', 'asc');
                break;
        }
    }
}
