<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Budget extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'category_id',
        'budget_amount',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
