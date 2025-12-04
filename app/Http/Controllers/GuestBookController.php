<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\GuestBook;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    // ============================
    // TAMPILKAN DAFTAR BUKU TAMU
    // ============================
    // public function index()
    // {
    //     $guestBooks = GuestBook::with('employees')->latest()->get();

    //     return view('admin.guest_book.index', compact('guestBooks'));
    // }

    public function index(Request $request)
    {
        // Mulai query
        $query = GuestBook::with('employees');

        // 🔹 Filter berdasarkan tanggal tertentu
        if ($request->date) {
            $query->whereDate('created_at', $request->date);
        }

        // 🔹 Filter berdasarkan bulan
        if ($request->month) {
            [$year, $month] = explode('-', $request->month);

            $query->whereYear('created_at', $year)
                ->whereMonth('created_at', $month);
        }

        // 🔹 Filter berdasarkan range tanggal
        if ($request->start_date && $request->end_date) {
            $query->whereBetween('created_at', [
                $request->start_date . ' 00:00:00',
                $request->end_date . ' 23:59:59'
            ]);
        }

        // Ambil data
        $guestBooks = $query->latest()->get();

        return view('admin.guest_book.index', compact('guestBooks'));
    }

    // ============================
    // FORM INPUT TAMU
    // ============================
    public function create()
    {
        $employees = Employee::all();
        return view('admin.guest_book.create', compact('employees'));
    }

    // ============================
    // SIMPAN DATA TAMU
    // ============================
    public function store(Request $request)
    {
        $request->validate([
            'guest_name'    => 'required',
            'number_phone'  => 'required',
            'agency'        => 'required',
            'objective'     => 'required',
            'employee_ids'  => 'required|array',
        ]);

        $guest = GuestBook::create([
            'guest_name'   => $request->guest_name,
            'number_phone' => $request->number_phone,
            'agency'       => $request->agency,
            'objective'    => $request->objective,
            'arrival_time'    => $request->arrival_time,
        ]);

        // Simpan relasi pegawai
        $guest->employees()->sync($request->employee_ids);

        return redirect()->route('guest_book_index')
            ->with('success', 'Data tamu berhasil disimpan.');
    }

    // ============================
    // FORM EDIT TAMU
    // ============================
    public function edit($id)
    {
        $guest = GuestBook::findOrFail($id);
        $employees = Employee::all();

        return view('admin.guest_book.edit', compact('guest', 'employees'));
    }

    // ============================
    // UPDATE DATA TAMU
    // ============================
    public function update(Request $request, $id)
    {
        $request->validate([
            'guest_name'    => 'required',
            'number_phone'  => 'required',
            'agency'        => 'required',
            'objective'     => 'required',
            'employee_ids'  => 'required|array',
        ]);

        $guest = GuestBook::findOrFail($id);

        $guest->update([
            'guest_name'   => $request->guest_name,
            'number_phone' => $request->number_phone,
            'agency'       => $request->agency,
            'objective'    => $request->objective,
        ]);

        // Update relasi pegawai
        $guest->employees()->sync($request->employee_ids);

        return redirect()->route('guest_book_index')
            ->with('success', 'Data tamu berhasil diperbarui.');
    }

    // ============================
    // HAPUS DATA TAMU
    // ============================
    public function destroy($id)
    {
        $guest = GuestBook::findOrFail($id);
        $guest->delete();

        return redirect()->route('guest_book_index')
            ->with('success', 'Data tamu berhasil dihapus.');
    }
}
