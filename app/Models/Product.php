<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        // Finance product fields
        'name',
        'sku',
        'category',
        'purchase_price',
        'selling_price',
        'stock',
        'low_stock_at',
        'is_active',

        // Existing website product fields
        'type',
        'short_des',
        'tags',
        'thum_img',
        'adinfo',
        'description',
    ];

    protected $casts = [
        'purchase_price' => 'decimal:2',
        'selling_price'  => 'decimal:2',
        'stock'          => 'integer',
        'low_stock_at'   => 'integer',
        'is_active'      => 'boolean',
    ];

    public function saleItems(): HasMany
    {
        return $this->hasMany(SaleItem::class, 'product_id');
    }

    public function purchaseItems(): HasMany
    {
        return $this->hasMany(PurchaseItem::class, 'product_id');
    }
}
