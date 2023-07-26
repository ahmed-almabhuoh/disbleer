<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'period',
        'salary',
        'vat',
        'proposal',
        'job_id',
        'disable_id',
    ];

    // Relations
    public function disable()
    {
        return $this->belongsTo(Disable::class, 'disable_id', 'id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }
}
