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
        'created_at',
        'updated_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public static function getServicesPaginate($isActive = true, $perPage = 10): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $service = Service::query()
            ->with('user');

        if($isActive) {
            $service->where('active', true);
        }

        return $service->paginate($perPage);
    }

    public static function getServiceAll($isActive = true, $second = 3600)
    {
        return Cache::remember('service-all', $second, function() use ($isActive) {
            return Service::query()
                ->with('user')
                ->where('active', $isActive)
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
