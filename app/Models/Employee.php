<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [
        'id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function occupation()
    {
        return $this->hasOne(Occupation::class, 'employee_id', 'id');
    }
}
