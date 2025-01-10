<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
        'total_quantity',
    ];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}
