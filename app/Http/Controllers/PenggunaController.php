<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    public function login($id) {
        // ambil data pegawai dari tb_pegawai berdasarkan id
        $pegawai = DB::table('tb_pegawai')
                ->where('id', $id)
                ->first();

                // kirim data pegawai ke view dengan parameter detailPegawai ( id, nama, jabatan )
                // bila role pegawai, tampilkan halaman pegawai
                // bila role admin, tampilkan halaman admin
        return view('todo.beranda', [
            'detailPegawai' => $pegawai,

        ]);
    }

    // method admin
    public function adminLogin($id) {
        $detailPegawai = DB::table('tb_pegawai')
                            ->where('id', $id)
                            ->first();
        return view('admin.beranda', [
           'detailPegawai' => $detailPegawai
        ]);
    }

    public function prosesLogin(Request $request) {
        // Proses login pengguna
        // Validasi dan autentikasi pengguna
        // Redirect ke halaman admin atau user sesuai dengan peran pengguna

        // if ($request->userName != 'admin@todo.org' && $request->kataSandi != 'admin') {
        //     return redirect('/')->with('error', 'Kombinasi salah! Mohon perbaiki kembali...');
        // } else if ($request->userName == "" && $request->kataSandi == "") {
        //     return redirect('/')->with('kosong', 'Harus diisi semua! Mohon perbaiki kembali...'); 
        // }
        // else {
        //     return redirect('/todo/mytodo');
        // }

        // ==> ambil data user dari tabel tb_login
        // bila ada kan mengembalikan id
        $user = DB::table('tb_login')
                ->where('nama_pengguna', $request->userName)
                ->where('kata_sandi', $request->kataSandi)
                ->first();

                // return "$user"; // mengembalikan data dengan format JSON, bila data ada

                if ($user) {
                    // Jika pengguna ditemukan, ambil data lengkap pengguna dari tb_pegawai
                    $detailPegawai = DB::table('tb_pegawai')
                            ->where('id', $user->id)
                            ->first();

                            // jika jabatan CEO, tampilkan halaman admin
                            // jika jabatan Manajer, tampilkan halaman khusus CEO
                            // jika jabatan Staff, tampilkan halaman pegawai

                            if($detailPegawai->jabatan == 'Staff') { // bila jabatan Staff
                                return view('todo.beranda', [
                                    'detailPegawai' => $detailPegawai
                                ]);
                            } else if ($detailPegawai->jabatan == 'Manajer') { // bila jabatan Manajer
                                return "Halaman Manajer, <b>halaman akan segera hadir!</b>"; 
                            } else { // bila jabatan CEO
                                return view('admin.beranda', [
                                    'detailPegawai' => $detailPegawai
                                ]);
                                
                            }
                } else {
                    return redirect('/')->with('error', 'Nama pengguna tidak ditemukan! Mohon perbaiki kembali...');
                }
    }
}
