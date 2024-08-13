<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'id', 'image', 'name', 'phone', 'division_id', 'position',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
