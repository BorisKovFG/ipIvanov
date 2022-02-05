<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CultureGroup extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'culture_groups';

    protected $fillable = [
        'name',
    ];

    public function fertilizers()
    {
        return $this->hasMany(Fertilizer::class, 'culture_group_id', 'id');
    }

}
