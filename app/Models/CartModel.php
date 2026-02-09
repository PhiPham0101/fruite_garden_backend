<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\CartModelItem;

class CartModel extends Model
{
    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'total_price',
        'total_quantity',
    ];

    public function items()
    {
        return $this->hasMany(CartModelItem::class, 'cart_id');
    }
}