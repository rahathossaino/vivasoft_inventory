<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductQty extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 'warehouse_id', 'qty',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class)->select(['id','name','is_active']);
    }
}
