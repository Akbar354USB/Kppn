<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplate;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    public function index()
    {
        $templates = EmailTemplate::all();
        return view('emails.templates.index', compact('templates'));
    }

    public function edit($id)
    {
        $template = EmailTemplate::findOrFail($id);
        return view('emails.templates.edit', compact('template'));
    }

    public function update(Request $request, $id)
    {
        $template = EmailTemplate::findOrFail($id);

        $template->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->back()->with('success', 'Template berhasil diperbarui!');
    }
}
