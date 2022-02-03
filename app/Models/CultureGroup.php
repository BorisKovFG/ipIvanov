<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CultureGroup extends Model
{
    use HasFactory;

    protected $table = 'culture_groups';

    protected $fillable = [
        'name',
    ];

}
