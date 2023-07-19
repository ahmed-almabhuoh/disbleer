<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagerSocialMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'manager_id'
    ];

    // Relations
    public function manager()
    {
        return $this->belongsTo(Manager::class, 'manager_id', 'id');
    }
}
