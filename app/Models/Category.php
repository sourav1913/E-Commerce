<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name','parent','description','icon','image'];
   
    public function childs(){
        return $this->hasMany(Category::class, "parent_id", 'id');
    }

    public function products(){
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
}
