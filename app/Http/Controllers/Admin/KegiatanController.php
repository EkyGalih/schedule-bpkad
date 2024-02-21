<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::get();

        return view('Admin.Kegiatan.kegiatan', compact('kegiatans'));
    }

    public function store(Request $request)
    {
        Kegiatan::create([
            'kegiatan' => $request->kegiatan
        ]);

        return redirect()->route('kegiatan.index')->with(['success' => 'Kegiatan berhasil ditambahkan!']);
    }

    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update([
            'kegiatan' => $request->kegiatan
        ]);

        return redirect()->route('kegiatan.index')->with(['success' => 'Kegiatan berhasil diubah!']);
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with(['success' => 'Kegiatan berhassil dihapus!']);
    }
}

