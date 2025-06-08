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
                ->where('tugas_untuk', '!=', $id)
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

    public function simpanPenugasanBaru(Request $request) {
        //simpan data
        DB::table('tb_todo')
            ->insert([
                'tugas' => $request->namaTodo,
                'waktu_mulai' => $request->tanggalMulai,
                'waktu_selesai' => $request->tanggalSelesai,
                'tugas_dari' => $request->pemberiTugas,
                'tugas_untuk' => $request->namaPenugas,
                'keterangan' => 'Ditugaskan'
            ]);
        
        // ambil semua data untuk ditampilkan
        // $semuaTodo = DB::table('tb_todo')
        //         ->get();

        //semua todo dengan nama delegator dan pelaksana
        $semuaTodo = DB::table('tb_todo')
              ->join('tb_pegawai as pemberi', 'tb_todo.tugas_dari', '=', 'pemberi.id')
              ->join('tb_pegawai as penerima', 'tb_todo.tugas_untuk', '=', 'penerima.id')
              ->select('tb_todo.*',
                'pemberi.nama as nama_pemberi',
                'penerima.nama as nama_penerima')
                ->get();
        return view('manajer.dataPenugasan', [
            'dataTodo' => $semuaTodo
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

    public function ubahPenugasan($id, $adminId) {
        // $detailTodo = DB::table('tb_todo')
        //             ->where('id', $id)
        //             ->get();

        $detailTodo = DB::table('tb_todo')
                    ->join('tb_pegawai as pemberi', 'tb_todo.tugas_dari', '=', 'pemberi.id')
                    ->join('tb_pegawai as penerima', 'tb_todo.tugas_untuk', '=', 'penerima.id')
                    ->select('tb_todo.*', 
                            'pemberi.nama as nama_pemberi', 
                            'penerima.nama as nama_penerima')
                    ->where('tb_todo.id', $id)
                    ->get();
        
        //ambil data Manajer dan CEO
        $delegator = DB::table('tb_pegawai')
                    ->where('id', $adminId)
                    // ->orWhere('jabatan', 'CEO')
                    ->get();

        //ambil data Staff CEO
        $pelaksana = DB::table('tb_pegawai')
                    ->where('jabatan', 'Staff')
                    ->orWhere('jabatan', 'Manajer')
                    ->get();

        return view('manajer.ubahPenugasan', [
            //bawa data dari $todo
            'detailTodo' => $detailTodo,
            'delegator' => $delegator,
            'pelaksana' => $pelaksana,
            'adminId' => $adminId // id admin yang login
        ]);
    }

    public function tugasSaya($id) {
        $todoSaya = DB::table('tb_todo')
                    ->join('tb_pegawai as pemberi', 'tb_todo.tugas_dari', '=', 'pemberi.id')
                    ->join('tb_pegawai as penerima', 'tb_todo.tugas_untuk', '=', 'penerima.id')
                    ->select('tb_todo.*',
                        'pemberi.nama as nama_pemberi',
                        'penerima.nama as nama_penerima')
                        ->where('tugas_untuk', '=', 1)
                        ->get();
        // dd($todoSaya); 
        return view('manajer.tugasSaya', [
            'tugasSaya' => $todoSaya,
            'adminId' => $id // id admin yang login
        ]);
    }

    public function simpanPembaruanTugas(Request $request, $id, $adminId) {
        //update status dalam tb_todo
        //kemudian simpan pembaruan data dalam tb_hasiltodo
        DB::table('tb_todo')
            ->where('id', $id)
            ->update([
                'tugas' => $request->namaTodo,
                'waktu_mulai' => $request->tanggalMulai,
                'waktu_selesai' => $request->tanggalSelesai,
                'tugas_dari'  => $request->pemberiTugas,
                'tugas_untuk' => $request->namaPenugas,
            ]);
        
        //ambil data 
        $todo = DB::table('tb_todo')
                ->join('tb_pegawai as pemberi', 'tb_todo.tugas_dari', '=', 'pemberi.id')
                ->join('tb_pegawai as penerima', 'tb_todo.tugas_untuk', '=', 'penerima.id')
                ->select('tb_todo.*',
                    'pemberi.nama as nama_pemberi',
                    'penerima.nama as nama_penerima')
                ->get();
        return view('manajer.dataPenugasan', [
                'dataTodo' => $todo,
                'adminId' => $adminId // id admin yang login
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

    public function dataPegawai($idManajer) {
        $dataPegawai = DB::table('tb_pegawai')
                        ->get();
        return view('manajer.pegawai.dataPegawai', [
            'dataPegawai' => $dataPegawai,
            'idManajer' => $idManajer
        ]);
    }

    public function profilManajer($idUser) {
        $profil = DB::table('tb_pegawai')
                    ->join('tb_login', 'tb_login.id', '=','tb_pegawai.id')
                    ->where('tb_pegawai.id', $idUser)
                    ->select('tb_login.*', 'tb_pegawai.*')
                    ->first();
                    // dd($profil);
        return view('manajer.profilUser.profilUser', [
            'profilPengguna' => $profil,
            'idPengguna' => $idUser
        ]);
    }
}
