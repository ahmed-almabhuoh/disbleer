<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisableMetaData extends Model
{
    use HasFactory;
    protected $fillable = [
        'disable_id',
        'country_id',
    ];


    // Relations
    public function disable()
    {
        return $this->belongsTo(Disable::class, 'disable_id', 'id');
    }
}
