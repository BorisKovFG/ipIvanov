<?php

namespace App\Http\Filters\Admin;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class ClientFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const AGREEMENT_DATE = 'agreement_date';
    public const DELIVERY_COST = 'delivery_cost';
    public const REGION = 'region';
    public const STATUS = 'status';


    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::AGREEMENT_DATE => [$this, 'agreementDate'],
            self::DELIVERY_COST => [$this, 'deliveryCost'],
            self::REGION => [$this, 'region'],
            self::STATUS => [$this, 'status'],
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
}
