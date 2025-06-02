<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;

class Form extends Model
{
    protected $table = 'forms';

    protected $fillable = [
        'data',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function casts(): array
    {
        return [
            'data' => 'array',
        ];
    }

    public function getCreatedAtAttribute($date): string
    {
        $dateTime = new \DateTime($date);

        return $dateTime->format('d.m.Y H:i:s');
    }

    public function getUpdatedAtAttribute($date): string
    {
        $dateTime = new \DateTime($date);

        return $dateTime->format('d.m.Y H:i:s');
    }


    public static function getFormsPaginate($isActive = true, $perPage = 10): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $form = Form::query()
            ->with('user');

        if($isActive) {
            $form->where('active', true);
        }

        return $form->paginate($perPage);
    }

    public static function getFormById(int $id, $second = 3600): Form {
        return Form::query()
            ->with('user')
            ->findOrFail($id);
    }
}
