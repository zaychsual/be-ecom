<?php

namespace App\Models;

use Carbon\Carbon;

class CustModel extends \Illuminate\Database\Eloquent\Model
{
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $user              = auth()->guard('api_cust')->user()->id;
            $model->created_by = $user ?? 1;
            $model->created_at = Carbon::now();
            $model->updated_at = Carbon::now();
        });
        static::updating(function ($model) {
            $user              = auth()->guard('api_cust')->user()->id;
            $model->updated_by = $user ?? 1;
            $model->updated_at = Carbon::now();
        });
    }
}
