<?php

namespace App\Models;

use App\Models\OrderItem;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class,'order_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function transaction()
    {
        return $this->hasOne(Transaction::class,'order_id');
    }
}
