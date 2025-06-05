<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManajerController extends Controller
{
        public function dataPenugasan($id) {

        //menyertakan nama dari delegator dan pelaksana
        // SQL :
        // SELECT 
        // tb_todo.*, 
        // pemberi.nama AS nama_pemberi, 
        // penerima.nama AS nama_penerima
        // FROM tb_todo
        // JOIN tb_pegawai AS pemberi ON tb_todo.tugas_dari = pemberi.id
        // JOIN tb_pegawai AS penerima ON tb_todo.tugas_untuk = penerima.id;

        $semuaTodo = DB::table('tb_todo')
              ->join('tb_pegawai as pemberi', 'tb_todo.tugas_dari', '=', 'pemberi.id')
              ->join('tb_pegawai as penerima', 'tb_todo.tugas_untuk', '=', 'penerima.id')
              ->select('tb_todo.*',
                'pemberi.nama as nama_pemberi',
                'penerima.nama as nama_penerima')
                ->get();
            
        return view('manajer.dataPenugasan', [
            'dataTodo' => $semuaTodo,
            'adminId' => $id // id admin yang login
        ]);
    }

    public function penugasanBaru($id) {
        $delegator = DB::table('tb_pegawai')
                    // ->where('jabatan', 'Manajer')
                    ->where('id', $id)
                    ->get();
        
        $pelaksana = DB::table('tb_pegawai')
                    ->where('jabatan', 'Staff')
                    ->orWhere('jabatan', 'Manajer')
                    ->get();
        return view('manajer.penugasanBaru', [
            'namaDelegator' => $delegator,
            'namaPelaksana' => $pelaksana,
            'adminId' => $id // id admin yang login
        ]);
    }

    public function penugasanDitolak($id) {
        $penugasanDitolak = DB::table('tb_todo')
                ->join('tb_pegawai as pemberi', 'tb_todo.tugas_dari', '=', 'pemberi.id')
                ->join('tb_pegawai as penerima', 'tb_todo.tugas_untuk', '=', 'penerima.id')
                ->select('tb_todo.*',
                    'pemberi.nama as nama_pemberi',
                    'penerima.nama as nama_penerima')
                ->where('keterangan', 'Ditolak')
                ->get();
        return view('manajer.penugasanDitolak', [
            'penugasanDitolak' => $penugasanDitolak,
            'adminId' => $id // id admin yang login
        ]);
    }

        public function penugasanSelesai($id) {
        $penugasanSelesai = DB::table('tb_todo')
                ->join('tb_pegawai as pemberi', 'tb_todo.tugas_dari', '=', 'pemberi.id')
                ->join('tb_pegawai as penerima', 'tb_todo.tugas_untuk', '=', 'penerima.id')
                ->select('tb_todo.*',
                    'pemberi.nama as nama_pemberi',
                    'penerima.nama as nama_penerima')
                ->where('keterangan', 'Selesai')
                ->get();
        return view('manajer.penugasanSelesai', [
            'penugasanSelesai' => $penugasanSelesai,
            'adminId' => $id // id admin yang login
        ]);
    }

    public function rincianPenugasan($id) {
        $ditugaskan = DB::table('tb_todo')
                ->where('keterangan', 'Ditugaskan')
                ->get();
        $diselesaikan = DB::table('tb_todo')
                ->where('keterangan', 'Selesai')
                ->get();
        $ditolak = DB::table('tb_todo')
                ->where('keterangan', 'Ditolak')
                ->get();

        // mengambil nilai jumlah penugasan
        $jumlahDitugaskan = DB::table('tb_todo')
                ->where('keterangan', 'Ditugaskan')
                ->count();
        $jumlahDiselesaikan = DB::table('tb_todo')
                ->where('keterangan', 'Selesai')
                ->count();
        $jumlahDitolak = DB::table('tb_todo')
                ->where('keterangan', 'Ditolak')
                ->count();

        return view('manajer.rincianPenugasan', [
                    'ditugaskan' => $ditugaskan,
                    'diselesaikan' => $diselesaikan,
                    'ditolak' => $ditolak,
                    'adminId' => $id, // id admin yang login
                    'jumlahDitugaskan' => $jumlahDitugaskan,
                    'jumlahDiselesaikan' => $jumlahDiselesaikan,
                    'jumlahDitolak' => $jumlahDitolak
                ]);
    }
}
