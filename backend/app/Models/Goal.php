<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Goal extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'description',
        'target_amount',
        'current_amount',
        'achieved_amount',
        'is_completed',
        'deadline',
    ];


    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
