<?php

namespace App\Models;
use App\Models\OrderDetail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const STATUS_ORDERED   = 'ORDERED';
    const STATUS_CONFIRMED = 'CONFIRMED';
    const STATUS_SHIPPING  = 'SHIPPING';
    const STATUS_COMPLETED = 'COMPLETED';
    const STATUS_CANCELLED = 'CANCELLED';

    protected $fillable = [
        "fullName",
        "address",
        "phone",
        "email",
        "note",
        "status",   
    ];

    protected $table = 'orders';

    public function details() {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
