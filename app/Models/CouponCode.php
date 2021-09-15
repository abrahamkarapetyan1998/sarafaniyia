<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponCode extends Model
{
    use HasFactory;

    protected $table = 'coupon_code';

    protected $fillable = [
        'user_id',
        'coupon_id',
    ];

    public $timestamps = false;
}
