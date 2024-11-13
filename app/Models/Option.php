<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type'];

    public function features(){
        return $this->hasMany(Feature::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('value');
    }
}
