<?php
namespace App\Models\Finance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Purchase extends Model {
    protected $table = 'purchases'; protected $guarded = [];
    protected $casts = ['purchase_date' => 'date', 'total' => 'decimal:2', 'paid_amount' => 'decimal:2'];
    public function supplier(): BelongsTo { return $this->belongsTo(Supplier::class); }
    public function items(): HasMany { return $this->hasMany(PurchaseItem::class); }
}
