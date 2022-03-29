<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    public function customer(){
        return $this->hasOne(Customer::class,'id','customer_id');
    }

    public function customeraddrs(){
        return $this->hasOne(CustomerAddr::class,'customer_id','customeraddrs_id');
    }

    public function details(){
        return $this->hasMany(OrderDetail::class);
    }
}
