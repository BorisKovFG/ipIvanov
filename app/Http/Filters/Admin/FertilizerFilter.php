<?php

namespace App\Http\Filters\Admin;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class FertilizerFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const NORM_NITROGEN = 'norm_nitrogen';
    public const NORM_PHOSPHORUS = 'norm_phosphorus';
    public const NORM_POTASSIUM = 'norm_potassium';
    public const CULTURE_GROUP_ID = 'culture_group_id';
    public const REGION = 'region';
    public const PRICE = 'price';
    public const DESCRIPTION = 'description';
    public const PURPOSE = 'purpose';
    public const STATUS = 'status';


    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::NORM_NITROGEN => [$this, 'normNitrogen'],
            self::NORM_PHOSPHORUS => [$this, 'normPhosphorus'],
            self::NORM_POTASSIUM => [$this, 'normPotassium'],
            self::CULTURE_GROUP_ID => [$this, 'cultureGroupId'],
            self::REGION => [$this, 'region'],
            self::PRICE => [$this, 'price'],
            self::DESCRIPTION => [$this, 'description'],
            self::PURPOSE => [$this, 'purpose'],
            self::STATUS => [$this, 'status'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function normNitrogen(Builder $builder, $value)
    {
        $builder->whereBetween('norm_nitrogen', [$value['begin'], $value['end']]);
    }

    public function normPhosphorus(Builder $builder, $value)
    {
        $builder->whereBetween('norm_phosphorus', [$value['begin'], $value['end']]);
    }

    public function normPotassium(Builder $builder, $value)
    {
        $builder->whereBetween('norm_potassium', [$value['begin'], $value['end']]);
    }

    public function cultureGroupId(Builder $builder, $value)
    {
        $builder->whereIn('culture_group_id', $value);
    }

    public function region(Builder $builder, $value)
    {
        $builder->where('region', 'like', "%{$value}%");
    }

    public function price(Builder $builder, $value)
    {
        $builder->whereBetween('price', [$value['begin'], $value['end']]);
    }

    public function description(Builder $builder, $value)
    {
        $builder->where('description', 'like', "%{$value}%");
    }

    public function purpose(Builder $builder, $value)
    {
        $builder->where('purpose', 'like', "%{$value}%");
    }

    public function status(Builder $builder, $value)
    {
        if ($value === 'deleted') {
            $builder->onlyTrashed();
        }
    }
}
