<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDocuments extends Model
{
    protected $fillable = ['item_id', 'document_name'];

    // Relasi: item_dokuments milik satu item
    public function items()
    {
        return $this->belongsTo(Items::class, 'item_id');
    }

    // Relasi: Satu item_dokuments memiliki banyak upload
    public function uploads()
    {
        return $this->hasMany(Uploads::class);
    }
}
