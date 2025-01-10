<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $fillable = [
        'name',
        'role',
        'identity_number',
        'equipment_id',
        'status',
        'borrow_date',
        'return_date',
        'detail'
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
