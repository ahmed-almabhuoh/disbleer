<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Scopes
    public function scopeOwn($query)
    {
        return auth('disable')->check()
            ? $query->where('disable_id', '=', auth()->user()->id)
            : $query->where('supervisor_id', '=', auth()->user()->id);
    }

    // Relations
    public function disable()
    {
        return $this->belongsTo(Disable::class, 'disable_id', 'id');
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class, 'supervisor_id', 'id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'conversation_id', 'id');
    }
}
