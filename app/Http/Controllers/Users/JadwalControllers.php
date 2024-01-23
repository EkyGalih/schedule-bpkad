<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Bidang;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class JadwalControllers extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::orderBy('kegiatan', 'ASC')->get();
        $bidangs = Bidang::orderBy('nama_bidang', 'ASC')->get();

        return view('Users.Jadwal.jadwal', compact('kegiatans', 'bidangs'));
    }
}
