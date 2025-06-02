<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'active',
        'title',
        'description',
        'filepath',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public static function getNewssPaginate($isActive = true, $perPage = 10): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $News = News::query()
            ->with('user');

        if($isActive) {
            $News->where('active', true);
        }

        return $News->paginate($perPage);
    }

    public static function getNewsAll($isActive = true, $second = 3600)
    {
        return Cache::remember('News-all', $second, function() use ($isActive) {
            return News::query()
                ->with('user')
                ->where('active', $isActive)
                ->get(['title', 'price']);
        });
    }

    public static function getNewsById(int $id, $second = 3600): News {
        return News::query()
            ->with('user')
            ->findOrFail($id);
    }
}
