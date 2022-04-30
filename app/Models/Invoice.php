<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'invoice',
        'customer_id',
        'courier',
        'courier_service',
        'courier_cost',
        'weight',
        'name',
        'phone',
        'city_id',
        'province_id',
        'address',
        'status',
        'grand_total',
        'snap_token',
        'deleted_at'
    ];

    public const status = [
        10 => 'pending',
        20 => 'success',
        30 => 'expired',
        40 => 'failed',
    ];

    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class);
    }

    public function customers()
    {
        return $this->belongsTo(\App\Models\Customer::class, 'customer_id');
    }

    public function cities()
    {
        return $this->belongsTo(\App\Models\City::class, 'city_id');
    }

    public function provinces()
    {
        return $this->belongsTo(\App\Models\Province::class, 'province_id');
    }
}
