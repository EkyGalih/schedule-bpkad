<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bidang;
use App\Models\Jadwal;
use App\Models\Kegiatan;
use App\Models\Pegawai;
use App\Models\Tahun;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function kegiatan($id)
    {

        $kegiatan = Kegiatan::where('kegiatan', 'like', '%' . $id . '%')->select('id')->first();
        if ($kegiatan != null) {
            return $kegiatan->id;
        } else {
            return 'false';
        }
    }

    public function tahun($id)
    {
        $tahun = Tahun::where('tahun', 'like', '%' . $id . '%')->select('id')->first();
        return $tahun->id;
    }

    public function schedule(Request $request)
    {
        $bidang = Bidang::findOrFail($request->bidang_id);
        $user = User::findOrFail($request->users_id);

        if (strtoupper($request->keterangan) == 'TD') {
            Jadwal::create([
                'kegiatan_id' => $request->keg_id,
                'tahun_id' => $request->tahun_id,
                'waktu_mulai' => $request->waktu_mulai,
                'waktu_berakhir' => $request->waktu_berakhir,
                'bidang_id' => $request->bidang_id,
                'users_id' => $request->users_id,
                'keterangan' => strtoupper($request->keterangan).' ('.$user->nama.'-'.$bidang->nama_bidang.')'
            ]);
        } else {
            Jadwal::create([
                'kegiatan_id' => $request->keg_id,
                'tahun_id' => $request->tahun_id,
                'waktu_mulai' => $request->waktu_mulai,
                'waktu_berakhir' => $request->waktu_berakhir,
                'bidang_id' => $request->bidang_id,
                'users_id' => $request->users_id,
                'keterangan' => strtoupper($request->keterangan).' ('.$bidang->nama_bidang.')'
            ]);
        }

        return $request;
    }

    public function getSchedule()
    {
        $jadwal = Jadwal::join('bidang', 'schedule.bidang_id', '=', 'bidang.id')
            ->select('schedule.id', 'keterangan as title', 'waktu_mulai as start', 'waktu_berakhir as end', 'warna_bidang as color', 'warna_text as textColor')->get();
        return $jadwal;
    }

    public function ubahJadwal(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update([
            'waktu_mulai' => $request->date,
            'waktu_berakhir' => $request->date
        ]);

        return;
    }

    public function ubahJadwalResize(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update([
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_berakhir' => $request->waktu_berakhir
        ]);

        return;
    }

    public function deleteJadwal($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return;
    }

    public function cekBidang($id)
    {
        $data = Jadwal::join('bidang', 'schedule.bidang_id', '=', 'bidang.id')
        ->select('bidang.id as bidang_id')
        ->where('schedule.id', '=', $id)
        ->first();
        return $data->bidang_id;
    }

    public function searchPegawai($value)
    {
        $data = Pegawai::where('name', 'like', '%'.$value.'%')
        ->orWhere('nip', 'like', '%'.$value.'%')
        ->select('id' ,'nip', 'name')
        ->get();

        return $data;
    }
}
