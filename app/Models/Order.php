<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'invoice_id',
        'product_id',
        'qty',
        'price',
        'deleted_at',
    ];

    /**
     * reviews
     *
     * @return void
     */
    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class, 'review_id');
    }

    /**
     * product
     *
     * @return void
     */
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id');
    }
}
