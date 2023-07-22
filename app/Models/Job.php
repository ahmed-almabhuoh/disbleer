<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    const TYPES = ['full-time', 'part-time'];
    const STATUS = ['in-progress', 'closed', 'open'];

    public function scopeByType($query, $type = 'all')
    {
        if ($type !== 'all')
            return $query->where('type', $type);
        return $query;
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Relations
    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class, 'supervisor_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
