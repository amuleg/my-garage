<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'brand',
        'model',
        'year',
        'vin',
        'description',
        'purchase_price',
        'sale_price',
        'purchase_date',
        'sale_date',
        'status',
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'sale_date' => 'date',
        'status' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
