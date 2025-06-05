<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dataPenugasan($id) {
        // mengambil data umum, delegator dan nama hanya by id
        // $semuaTodo = DB::table('tb_todo')
        //         ->get();

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
            
        return view('admin.dataPenugasan', [
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
        return view('admin.penugasanBaru', [
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
        return view('admin.dataPenugasan', [
            'dataTodo' => $semuaTodo
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

        return view('admin.ubahPenugasan', [
            //bawa data dari $todo
            'detailTodo' => $detailTodo,
            'delegator' => $delegator,
            'pelaksana' => $pelaksana,
            'adminId' => $adminId // id admin yang login
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
        return view('admin.dataPenugasan', [
                'dataTodo' => $todo,
                'adminId' => $adminId // id admin yang login
            ]);
    }

    public function hapusPenugasan($id) {
        DB::table('tb_todo')
        ->where('id', $id)
        ->delete();

        //ambil data 
        // $todo = DB::table('tb_todo')
        //         ->join('tb_pegawai as pemberi', 'tb_todo.tugas_dari', '=', 'pemberi.id')
        //         ->join('tb_pegawai as penerima', 'tb_todo.tugas_untuk', '=', 'penerima.id')
        //         ->select('tb_todo.*',
        //             'pemberi.nama as nama_pemberi',
        //             'penerima.nama as nama_penerima')
        //         ->get();
        
        // kembali ke view disertai parameter sebelumnya
        // return ('admin.dataPenugasan', [
        //         'dataTodo' => $todo
        //     ]);

        // kembali ke view langsung bentuk URL tanpa parameter
        return redirect('/admin/todo/dataPenugasan');
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
        return view('admin.penugasanSelesai', [
            'penugasanSelesai' => $penugasanSelesai,
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
        return view('admin.penugasanDitolak', [
            'penugasanDitolak' => $penugasanDitolak,
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

        return view('admin.rincianPenugasan', [
                    'ditugaskan' => $ditugaskan,
                    'diselesaikan' => $diselesaikan,
                    'ditolak' => $ditolak,
                    'adminId' => $id, // id admin yang login
                    'jumlahDitugaskan' => $jumlahDitugaskan,
                    'jumlahDiselesaikan' => $jumlahDiselesaikan,
                    'jumlahDitolak' => $jumlahDitolak
                ]);
    }

    // pengelolaan kepegawaian
    public function halamanKelolaPegawai($adminId) {
        return view('admin.pegawai.pegawai', [
            'adminId' => $adminId // id admin yang login
        ]);
    }

    public function dataPegawai($adminId) {
        $dataPegawai = DB::table('tb_pegawai')
                        ->where('jabatan', '!=', "CEO")
                        ->get();
        return view('admin.pegawai.dataPegawai', [
            'dataPegawai' => $dataPegawai,
            'adminId' => $adminId // id admin yang login
        ]);
    }
}
