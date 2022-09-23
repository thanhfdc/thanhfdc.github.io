<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    protected $table = 'categories';
   public function categoryChildrent(){
       return   $this->hasMany(Category::class, 'parent_id');
   }

   public function products(){
    return   $this->hasMany(Product::class, 'category_id');
  }
}
