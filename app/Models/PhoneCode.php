<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneCode extends Model
{
    use HasFactory;

    protected $table = 'phone_codes';

    protected $fillable  = ['phone' , 'code'];

    public $timestamps = false;
}
