<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fertilizer extends Model
{
    use HasFactory;

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
