<?php
namespace App\Models\Finance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Supplier extends Model {
    protected $table = 'suppliers'; protected $guarded = [];
    public function purchases(): HasMany { return $this->hasMany(Purchase::class); }
}
