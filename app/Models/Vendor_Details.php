<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor_Details extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'city',
        'address',
        'shop_number',
        'shop_images',
        'dealin',
    ];
}
