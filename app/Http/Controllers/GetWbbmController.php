<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetWbbmController extends Controller
{
    // public function monitorWbbm()
    // {
    //     return view('wbbm.monitoring');
    // }

public function monitorWbbm()
{
    $categories = Categories::with([
        'sub_categories.items.item_documents.uploads'
    ])->get();

    return view('wbbm.monitoring', compact('categories'));
}

}
