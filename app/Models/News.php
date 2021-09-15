<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Store;

class News extends Model
{
    use HasFactory;

    protected  $table  = 'news';


    public function stores(){
        return $this->BelongsTo(Store::class);
    }
}
