<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uploads extends Model
{
    protected $fillable = ['item_documents_id', 'file_path'];

    // Relasi: upload milik satu item_documents
    public function item_documents()
    {
        return $this->belongsTo(ItemDocuments::class);
    }
}
