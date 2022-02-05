<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fertilizer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'fertilizers';

    protected $fillable = [
        'name',
        'norm_nitrogen',
        'norm_phosphorus',
        'norm_potassium',
        'culture_group_id',
        'region',
        'price',
        'description',
        'purpose',
    ];

    public function cultureGroup()
    {
        return $this->belongsTo(CultureGroup::class, 'culture_group_id', 'id');
    }
}
