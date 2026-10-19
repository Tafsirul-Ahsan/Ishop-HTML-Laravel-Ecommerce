<?php
namespace App\Models\Finance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Expense extends Model {
    protected $table = 'expenses'; protected $guarded = [];
    protected $casts = ['expense_date' => 'date', 'amount' => 'decimal:2'];
    public function category(): BelongsTo { return $this->belongsTo(ExpenseCategory::class, 'category_id'); }
}
