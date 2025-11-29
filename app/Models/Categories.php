<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // Relasi: Satu kategori memiliki banyak sub-kategori
    public function sub_categories()
    {
        return $this->hasMany(SubCategories::class);
    }

    // Hitung progress kategori
    public function progress()
    {
        $totalDocs = 0;
        $uploaded = 0;

        foreach ($this->sub_categories as $sub) {
            foreach ($sub->items as $item) {
                foreach ($item->item_documents as $doc) {
                    $totalDocs++;
                    if ($doc->uploads) $uploaded++;
                }
            }
        }

        return $totalDocs > 0 ? round(($uploaded / $totalDocs) * 100) : 0;
    }
}
