<?php

namespace App\Http\Controllers;

use App\Models\EmailRecipient;
use Illuminate\Http\Request;

class EmailRecipientController extends Controller
{
    public function index()
    {
        $recipients = EmailRecipient::latest()->paginate(10);
        return view('emails.email_recipients.index', compact('recipients'));
    }

    public function create()
    {
        return view('emails.email_recipients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:email_recipients,email',
        ]);

        EmailRecipient::create($request->all());

        return redirect()->route('recipients.index')
            ->with('success', 'Penerima email berhasil ditambahkan!');
    }

    // public function edit(EmailRecipient $recipient)
    // {
    //     return view('emails.email_recipients.edit', compact('recipient'));
    // }
    public function edit($id)
    {
        $recipient = EmailRecipient::findOrFail($id);
        return view('emails.email_recipients.edit', compact('recipient'));
    }


    public function update(Request $request, $id)
    {
        $recipient = EmailRecipient::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:email_recipients,email,' . $id,
        ]);

        $recipient->update($request->only(['name', 'email']));

        return redirect()->route('recipients.index')
            ->with('success', 'Data penerima email berhasil diperbarui!');
    }


    // public function destroy(EmailRecipient $recipient)
    // {
    //     $recipient->delete();

    //     return redirect()->route('recipients.index')
    //         ->with('success', 'Penerima email berhasil dihapus!');
    // }

    public function destroy($id)
    {
        $recipient = EmailRecipient::findOrFail($id);
        $recipient->delete();

        return redirect()->route('recipients.index')
            ->with('success', 'Penerima email berhasil dihapus!');
    }
}
