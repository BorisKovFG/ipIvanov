<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImportStatus extends Model
{
    use HasFactory;

    const STATUS_NAMES = [
        'В процессе',
        'Ошибка во время импорта',
        'Данные успешно импортированы'
    ];

    protected $table = 'import_statuses';

    protected $fillable = [
        'status',
        'user_id'
    ];

    public function getStatus($id): string
    {
        return self::STATUS_NAMES[$id];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
