<?php

namespace App\Models;

use App\Enum\GroupPremission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = [
        'title',
        'permission',
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'groupId');
    }

    protected function casts(): array
    {
        return [
            'permission' => GroupPremission::class,
        ];
    }
}
