<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'id',
        'active',
        'title',
        'price',
        'description',
        'filepath',
        'user',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public static function getServicesPaginate($perPage = 10): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Service::query()
            ->with('user')
            ->where('active', true)
            ->paginate($perPage);
    }

    public static function getServiceAll($second = 3600)
    {
        return Cache::remember('service-all', $second, function() {
            return Service::query()
                ->with('user')
                ->where('active', true)
                ->get(['title', 'price']);
        });
    }

    public static function getServiceById(int $id, $second = 3600): Service {
        return Cache::remember('service-id-' . $id, $second, function() use ($id) {
            return Service::query()
                ->with('user')
                ->findOrFail($id);
        });
    }
}
