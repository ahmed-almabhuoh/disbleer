<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    const METHODS = ['paypal'];
    const TYPE = ['payment', 'withdraw', 'refunds'];
    const STATUS = ['completed', 'pending', 'failed', 'canceled'];

    // Scopes
    public function scopeByMethod($query, $method)
    {
        return $query->where('method', $method);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Relations
    public function disable()
    {
        return $this->belongsTo(Disable::class, 'disable_id', 'id');
    }
}
