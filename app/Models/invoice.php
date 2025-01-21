<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'amount',
        'description',
        'due_date',
        'is_paid'];
    protected $casts = [
        'due_date' => 'datetime', // Ensure due_date is cast to DateTime
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
