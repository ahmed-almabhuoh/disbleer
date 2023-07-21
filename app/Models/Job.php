<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    const TYPES = ['full-time', 'part-time'];

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
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
