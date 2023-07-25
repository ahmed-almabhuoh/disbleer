<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Disable extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'fname', 'lname', 'email', 'password', 'status', 'image', 'created_at', 'updated_at'
    ];

    const STATUS = ['active', 'inactive'];

    public static function booted()
    {
        static::created(function (Disable $disable) {
            DisableMetaData::create([
                'country_id' => 1,
                'disable_id' => $disable->id
            ]);

            DisableSocialMedia::create([
                'disable_id' => $disable->id
            ]);
        });
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }

    // Get Attributes
    public function getNameAttribute()
    {
        return $this->fname . ' ' . $this->lname;
    }

    public function getStatusClassAttribute()
    {
        return $this->status == 'active' ? 'badge bg-success py-1 fs-6 rounded-pill' : 'badge bg-secondary py-1 fs-6 rounded-pill';
    }

    // Relations
    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'disable_id', 'id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_disable', 'disable_id', 'course_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'disable_id', 'id');
    }

    public function credits()
    {
        return $this->hasMany(Credit::class, 'disable_id', 'id');
    }

    public function metadata()
    {
        return $this->hasOne(DisableMetaData::class, 'disable_id', 'id');
    }

    public function socialMedia()
    {
        return $this->hasOne(DisableSocialMedia::class, 'disable_id', 'id');
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class, 'disable_id', 'id');
    }
}
