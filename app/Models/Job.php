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

    // Attributes
    public function getStatusClassAttribute()
    {
        return $this->status == 'open' ? 'badge bg-success py-1 fs-6 rounded-pill' : ($this->status == 'in-progress' ?   'badge bg-secondary py-1 fs-6 rounded-pill' :   'badge bg-danger py-1 fs-6 rounded-pill' );
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

    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'job_id', 'id');
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class, 'job_id', 'id');
    }
}
