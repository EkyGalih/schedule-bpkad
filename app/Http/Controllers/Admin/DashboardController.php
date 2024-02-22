<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;

class DashboardController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::orderBy('created_at', 'DESC')->get();

        return view('Admin.Dashboard.dashboard', compact('jadwals'));
    }
}
