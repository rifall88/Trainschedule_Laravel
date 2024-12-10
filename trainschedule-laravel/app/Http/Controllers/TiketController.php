<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Tiket;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function index()
    {
        $tikets = Tiket::all();
        return view('tiket.index', compact('tikets'));
    }

    public function create()
    {
        return view('tiket.create');
    }

    public function store(Request $request)
    {
        $validated= $request->validate([
            'asal' => 'required',
            'tujuan' => 'required',
            'class' => 'required',
            'tanggal' => 'required|date',
        ]);

        Tiket::create([
            'Stasiun_Asal' => $request['asal'],
            'Stasiun_Tujuan' => $request['tujuan'],
            'Class' => $request['class'],
            'Tanggal_Berangkat' => $request['tanggal'],
            'Jumlah_PenumpangDewasa' => '2',
            'Jumlah_PenumpangBayi' => '2',
        ]);
        return redirect()->route('tikets.index')
            ->with('success', 'Tiket berhasil ditambahkan.');
            echo "<script>alert('" . $request['asal'] . "');</script>";
    }

    public function edit(Tiket $tiket)
    {
        return view('tiket.edit', compact('tiket'));
    }

    public function update(Request $request, Tiket $tiket)
    {
        $request->validate([
            'Stasiun_Asal' => 'required',
            'Stasiun_Tujuan' => 'required',
            'Class' => 'required',
            'Tanggal_Berangkat' => 'required|date',
        ]);

        $tiket->update($request->all());
        return redirect()->route('tikets.index')
            ->with('success', 'Tiket berhasil diperbarui.');
    }

    public function destroy(Tiket $tiket)
    {
        $tiket->delete();
        return redirect()->route('tikets.index')
            ->with('success', 'Tiket berhasil dihapus.');
    }
    public function show()
    {
        $tikets = Tiket::all();
        $pdf = Pdf::loadView('tiket.schedule-cetak', compact('tikets'));
        return $pdf->download('laporan-transaksi.pdf');
    }
}
