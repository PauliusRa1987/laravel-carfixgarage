<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkShop extends Model
{
    use HasFactory;
    public function facilitys()
    {
        return $this->hasMany(Facility::class, 'shop_id', 'id');
    }
    
}
