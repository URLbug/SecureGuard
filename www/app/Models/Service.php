<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'active',
        'title',
        'price',
        'description',
        'filepath',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
