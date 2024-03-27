<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $table = 'shop';
    protected $primaryKey = 'id';
    protected $fillable = ['status','shop_name','contact','address',];
    public function getProduct($id = false)
    {
        if($id === false){
            return $this->all();
        }else{
            return $this->where('id', $id)->first();
        }
    }
    public function images()
    {
    return $this->hasMany(Image::class);

    }

     public function updateProduct($data, $id)
    {
        $product = $this->find($id);
        $product->update($data);
        return $product;
    }

    public function deleteProduct($id)
    {
        return $this->destroy($id);
    }
}
