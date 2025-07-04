<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'description',
        'amount',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
