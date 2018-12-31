<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
    protected $table = 'product_images';
    protected $fillable = ['name', 'product_id'];
    public $timestamp = false;

    public function product() {
        return $this->belongsTo('App\Product');
    }
}
