<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Kegiatan;
use App\Models\Tahun;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function kegiatan($id)
    {
        $kegiatan = Kegiatan::where('kegiatan', 'like', '%'.$id.'%')->select('id')->first();
        return $kegiatan->id;
    }

    public function tahun($id)
    {
        $tahun = Tahun::where('tahun', 'like', '%'.$id.'%')->select('id')->first();
        return $tahun->id;
    }

    public function schedule(Request $request){
        Jadwal::create([
            'kegiatan_id' => $request->keg_id,
            'tahun_id' => $request->tahun_id,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_berakhir' => $request->waktu_berakhir,
            'bidang_id' => $request->bidang_id,
            'users_id' => $request->users_id,
            'keterangan' => $request->keterangan
        ]);

        return $request;
    }

    public function getSchedule()
    {
        $jadwal = Jadwal::select('keterangan as title','waktu_mulai as start', 'waktu_berakhir as end')->get();
        return $jadwal;
    }
}
