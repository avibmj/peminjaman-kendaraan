<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function index()
    {
        $data = User::all();
        
        return view('user', compact('data'));
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        // Ubah status pengguna menjadi "nonaktif" tanpa menghapus data yang terkait

        $user->status = 'nonaktif';
        $user->save();

        return redirect()->back()->with('success', 'User disabled successfully');
    }

    public function activate($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        // Ubah status pengguna menjadi "aktif" kembali

        $user->status = 'aktif';
        $user->save();

        return redirect()->back()->with('success', 'User activated successfully');
    }

}
