<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bidang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        $bidangs = Bidang::orderBy('created_at', 'ASC')->get();

        return view('Admin.Users.users', compact('users', 'bidangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'nama'      => $request->nama,
            'username'  => $request->username,
            'password'  => Hash::make($request->password),
            'bidang_id' => $request->bidang_id,
            'rule'      => $request->rule
        ]);

        return redirect()->route('users.index')->with(['success' => 'Pengguna berhasil disimpan!']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'nama'      => $request->nama,
            'username'  => $request->username,
            'password'  => Hash::make($request->password),
            'bidang_id' => $request->bidang_id,
            'rule'      => $request->rule
        ]);

        return redirect()->route('users.index')->with(['success' => 'Pengguna berhasil disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with(['success' => 'Pengguna berhasil dihapus!']);
    }
}
