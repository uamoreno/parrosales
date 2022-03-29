<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddr extends Model
{

    protected $table = 'customeraddrs';

    use HasFactory;

    protected $fillable = [

        'name', 'phone','email'

    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

}
