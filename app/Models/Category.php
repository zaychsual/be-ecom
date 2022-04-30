<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'image', 'created_by', 'updated_by', 'deleted_at'
    ];

    public function creators()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }

    public function updaters()
    {
        return $this->belongsTo(\App\Models\User::class, 'updated_by');
    }

    public function products()
    {
        return $this->hasMany(\App\Models\Product::class);
    }
}
