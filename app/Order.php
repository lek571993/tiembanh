<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['code', 'fullname', 'gender', 'email', 'address', 'phone', 'note', 'user_id'];
}
