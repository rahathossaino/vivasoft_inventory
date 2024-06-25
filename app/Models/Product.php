<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Tax;
use App\Models\ProductQty;
use App\Models\Attachment;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'name', 'sku', 'symbology', 'brand_id', 'category_id', 'unit_id',
        'price', 'qty', 'alert_qty', 'tax_method','tax_id', 'has_stock',
        'has_expired_date', 'expired_date', 'details', 'is_active',
    ];

    public static $rules=[
        'name' => 'required|string|max:255',
        'sku' => 'required|string|unique:products',
        'symbology' => 'required|string',
        'brand_id' => 'required',
        'category_id' => 'required',
        'unit_id' => 'required',
        'price' => 'required|numeric|min:0',
        'qty' => 'required|integer|min:0',
        'alert_qty' => 'required|integer|min:0',
        'tax_method' => 'required|string',
        'tax_id' => 'required',
        'has_stock' => 'required|boolean',
        'has_expired_date' => 'required|boolean',
        'expired_date' => 'nullable|date',
        'details' => 'nullable|string',
        'is_active' => 'required|boolean',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class)->select(['id','name','is_active']);
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->select(['id','name','parent_id','is_active']);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class)->select(['id','name','code','for','base_unit','operator','operation_value','is_active']);
    }

    public function tax()
    {
        return $this->belongsTo(Tax::class)->select(['id','name','rate','is_active']);
    }

    public function productQties()
    {
        return $this->hasMany(ProductQty::class)->select(['id','product_id','warehouse_id','qty']);
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable')->select(['id','uploaded_user_id','attachmentable_id','attachmentable_type','url','state','label','file','content_type']);
    }
}
