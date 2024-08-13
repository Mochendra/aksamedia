<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id', 'name', 'username', 'password', 'phone', 'email'
    ];

    protected $hidden = [
        'password',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}