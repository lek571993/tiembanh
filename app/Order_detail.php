<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table = 'order_details';
    protected $fillable = ['quantity', 'price', 'product_id', 'order_id', 'pay'];
}
