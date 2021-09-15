<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';

    protected $fillable = [
        'client_id',
        'branch_id',
        "employee_id",
        "pricelistitem_id",
        "peoples_count",
        "date",
        "time",
        "wishes",
    ];

    public $timestamps = false;
}
