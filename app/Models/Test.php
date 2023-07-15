<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    const STATUS = ['active', 'inactive'];


    // Scopes
    public function scopeByStatus($query, $status)
    {
        if (!in_array($status, self::STATUS)) {
            throw new \InvalidArgumentException("Invalid status value: $status");
        }

        return $query->where('status', $status);
    }
}
