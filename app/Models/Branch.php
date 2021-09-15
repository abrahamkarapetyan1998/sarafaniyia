<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Store;
use App\Models\BranchHours;
    
class Branch extends Model
{
    use HasFactory;

    protected $table = 'branch';


    public function store(){
       return  $this->belongsTo(Store::class);
    }
    public function hours(){
        return $this->HasOne(BranchHours::class);
    }
}
