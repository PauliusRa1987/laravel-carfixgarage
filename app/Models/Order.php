<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function getFacilityId()
    {
        return $this->belongsTo(Facility::class, 'facility_id', 'id');
    }
    public function getMasterId()
    {
        return $this->belongsTo(Mechanic::class, 'mechanic_id', 'id');
    }
    public function getShopId()
    {
        return $this->belongsTo(WorkShop::class, 'shop_id', 'id');
    }
    public function getUserId()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}
