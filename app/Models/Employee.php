<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['employee_name', 'status'];

    public function guest_books()
    {
        return $this->belongsToMany(GuestBook::class, 'employee_guest_book');
    }
}
