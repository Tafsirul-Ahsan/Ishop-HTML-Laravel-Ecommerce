<?php
namespace App\Models\Finance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class SaleItem extends Model {
    protected $table = 'sale_items'; protected $guarded = [];
    public function sale(): BelongsTo { return $this->belongsTo(Sale::class); }
    public function product(): BelongsTo { return $this->belongsTo(Product::class); }
}
