<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{

    public function index()
    {
        $rentals = Rental::all();
        return view('rental.index', compact('rentals'));
    }

   
    public function create()
    {
        return view('rental.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'plat_nomor' => 'required|string|max:15|unique:tabel_armada,plat_nomor',
            'merk'       => 'required|string|max:50',
            'tahun'      => 'required|integer|min:1990|max:' . date('Y'),
            'transmisi'  => 'required|in:Manual,Matic',
        ]);

        Rental::create($data);

        return redirect()->route('rental.index')
            ->with('success', 'Data armada berhasil disimpan!');
    }

   
    public function edit(Rental $rental)
    {
        return view('rental.form', compact('rental'));
    }

   
    public function update(Request $request, Rental $rental)
    {
        $data = $request->validate([
            'merk'      => 'required|string|max:50',
            'tahun'     => 'required|integer|min:1990|max:' . date('Y'),
            'transmisi' => 'required|in:Manual,Matic',
        ]);

        $rental->update($data);

        return redirect()->route('rental.index')
            ->with('success', 'Data armada berhasil diperbarui!');
    }

    
    public function destroy(Rental $rental)
    {
        $rental->delete();

        return redirect()->route('rental.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}