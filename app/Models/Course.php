<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    const TYPE = ['internal', 'external'];
    const STATUS = ['active', 'inactive'];


    public function scopeByType($query, $type)
    {
        if (in_array($type, self::TYPE)) {
            return $query->where('type', $type);
        }
        return $query;
    }

    public function scopeByStatus($query, $status)
    {
        if (in_array($status, self::STATUS)) {
            return $query->where('status', $status);
        }
        return $query;
    }

    public function getStatusClassAttribute()
    {
        return $this->status == 'active' ? 'badge bg-success py-1 fs-6 rounded-pill' : 'badge bg-secondary py-1 fs-6 rounded-pill';
    }
}
