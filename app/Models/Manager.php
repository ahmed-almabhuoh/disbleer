<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Manager extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'fname', 'lname', 'email', 'password', 'status', 'image', 'created_at', 'updated_at'
    ];

    public static function booted()
    {
        static::created(function (Manager $manager) {
            ManagerMetaData::create([
                'country_id' => 1,
                'manager_id' => $manager->id
            ]);

            ManagerSocialMedia::create([
                'manager_id' => $manager->id
            ]);
        });
    }

    const STATUS = ['active', 'inactive'];

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
    public function metadata()
    {
        return $this->hasOne(ManagerMetaData::class, 'manager_id', 'id');
    }

    public function socialMedia()
    {
        return $this->hasOne(ManagerSocialMedia::class, 'manager_id', 'id');
    }
}
