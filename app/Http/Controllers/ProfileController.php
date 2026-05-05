<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function updatePassword(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ], [
            'new_password.confirmed' => 'Konfirmasi password baru tidak cocok.',
            'new_password.min' => 'Password baru minimal 8 karakter.',
        ]);

        // 2. Ambil data user dari database berdasarkan ID yang sedang login
        $user = User::findOrFail(Auth::id());

        // 3. Verifikasi Password Lama
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah!']);
        }

        // 4. UPDATE PAKSA
        // Kita gunakan update() langsung ke query builder supaya bypass semua cache
        User::where('id', $user->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        // 5. Penting: Refresh session auth supaya tidak logout otomatis di beberapa versi Laravel
        $request->session()->put('password_hash_'.Auth::getDefaultDriver(), $user->password);

        return back()->with('success', 'Password berhasil diupdate di database!');
    }
}