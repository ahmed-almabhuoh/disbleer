<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    const STATUS = ['active', 'draft'];

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function getStatusClassAttribute()
    {
        return $this->status == 'active' ? 'badge bg-success py-1 fs-6 rounded-pill' : 'badge bg-secondary py-1 fs-6 rounded-pill';
    }

    // Relations
    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }
}
