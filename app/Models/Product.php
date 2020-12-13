<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','slug','status', 'origin_price', 'sale_price', 'content', 'user_id'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function order(){
        return $this->belongsToMany(Order::class);
    }
    public function image(){
        return $this->hasMany(Image::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
