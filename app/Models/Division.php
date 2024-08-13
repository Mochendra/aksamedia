<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Division extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id', 'name',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}

class Division extends Model
{
    protected $fillable = [
        'id', 'name',
    ];
}
