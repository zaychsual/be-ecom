<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'province_id',
        'city_id',
        'name',
        'created_by',
        'updated_by',
        'deleted_at'
    ];
}
