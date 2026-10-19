<?php
namespace App\Models\Finance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class ExpenseCategory extends Model {
    protected $table = 'expense_categories'; protected $guarded = [];
    public function expenses(): HasMany { return $this->hasMany(Expense::class, 'category_id'); }
}
