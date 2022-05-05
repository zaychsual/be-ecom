<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends AdminModel
{
    use HasFactory, SoftDeletes;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'image', 'link', 'created_by', 'updated_by', 'deleted_at'
    ];

    public function creators()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }

    public function updaters()
    {
        return $this->belongsTo(\App\Models\User::class, 'updated_by');
    }

    public function getCreatedByAttribute($id)
    {
        return \App\Models\User::findOrFail($id)->name;
    }

    public function getUpdatedByAttribute($id)
    {
        return \App\Models\User::findOrFail($id)->name;
    }

    /**
     * getImageAttribute
     *
     * @param  mixed $image
     * @return void
     */
    public function getImageAttribute($image)
    {
        return asset('storage/sliders/' . $image);
    }
}
