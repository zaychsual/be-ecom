<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image',
        'title',
        'slug',
        'category_id',
        'description',
        'weight',
        'price',
        'stock',
        'discount',
        'created_by',
        'updated_by',
        'deleted_at'
    ];

    public function creators()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }

    public function updaters()
    {
        return $this->belongsTo(\App\Models\User::class, 'updated_by');
    }

    public function categories()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }
}
