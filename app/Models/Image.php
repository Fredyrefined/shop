<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = [
     'url', 'shop_id'
    ];
  public function shop()
  {
    return $this->belongsTo(Shop::class);
  }
}
