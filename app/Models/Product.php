<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    public function categories(){
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function colors(){
        return $this->belongsToMany(Color::class)->withTimestamps();
    }

    public function sizes(){
        return $this->belongsToMany(Size::class)->withTimestamps();
    }
}
