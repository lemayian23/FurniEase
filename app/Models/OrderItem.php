<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    // Specify table name if it does not follow the convention
    protected $table = 'order_items';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    // Disable timestamps if not used
    public $timestamps = false;

    /**
     * Relationship with Order
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relationship with Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
