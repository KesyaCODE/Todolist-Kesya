<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function mytodo($id) {
        //ambil semua data
        // $todo = DB::table('tb_todo')->get();

        $todo = DB::table('tb_todo')
                ->where('keterangan', 'Ditugaskan')
                ->where('tugas_untuk', $id)
                ->get();
        return view('todo.mytodo', [
            //bawa data dari $todo
            'daftarTugas' => $todo,
            'idPengguna' => $id // id pengguna yang login
        ]);
    }

    public function detailTodo($id) {
        $detailTodo = DB::table('tb_todo as todo')
            ->join('tb_pegawai as pemberi', 'todo.tugas_dari', '=', 'pemberi.id')
            ->select(
                'todo.id',
                'todo.tugas',
                'todo.waktu_mulai',
                'todo.waktu_selesai',
                'pemberi.nama as pemberi_tugas',
                'todo.keterangan'
            )
            ->where('todo.id', $id) // Gantilah $id dengan ID tertentu
            ->get();
            // ->first(); // Mengambil satu data

        return view('todo.detailTodo', [
            'detailTodo' => $detailTodo
        ]);
    }

    public function perbaruiTodo(Request $request, $id) {
        //update status dalam tb_todo
        //kemudian simpan pembaruan data dalam tb_hasiltodo
        DB::table('tb_todo')
            ->where('id', $id)
            ->update(['keterangan' => $request->statusPekerjaan]);
        
        //ambil data 
        $todo = DB::table('tb_todo')
            ->where('keterangan', 'Ditugaskan')
            ->get();
            return view('todo.mytodo', [
                'daftarTugas' => $todo
            ]);
        
    }

    public function todoSelesai($id) {
        $todoSelesai = DB::table('tb_todo')
                ->where('keterangan', 'Selesai')
                ->where('tugas_untuk', $id)
                ->get();

        return view('todo.todoSelesai', [
            'todoSelesai' => $todoSelesai,
            'idPengguna' => $id // id pengguna yang login
        ]);
    }

    public function todoDitolak($id) {
        $todoDitolak = DB::table('tb_todo')
                ->where('keterangan', 'Ditolak')
                ->where('tugas_untuk', $id)
                ->get();

        return view('todo.todoDitolak', [
            'todoDitolak' =>$todoDitolak,
            'idPengguna' => $id // id pengguna yang login
        ]);
    }

    //admin method
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

    public function penugasanBaru() {
        $delegator = DB::table('tb_pegawai')
                    // ->where('jabatan', 'Manajer')
                    ->where('jabatan', 'CEO')
                    ->get();
        
        $pelaksana = DB::table('tb_pegawai')
                    ->where('jabatan', 'Staff')
                    ->orWhere('jabatan', 'Manajer')
                    ->get();
        return view('admin.penugasanBaru', [
            'namaDelegator' => $delegator,
            'namaPelaksana' => $pelaksana
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

    public function ubahPenugasan($id) {
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
                    ->where('jabatan', 'Manajer')
                    ->orWhere('jabatan', 'CEO')
                    ->get();

        //ambil data Staff SELAIN Manajer dan CEO
        $pelaksana = DB::table('tb_pegawai')
                    ->where('jabatan', 'Staff')
                    ->get();

        return view('admin.ubahPenugasan', [
            //bawa data dari $todo
            'detailTodo' => $detailTodo,
            'delegator' => $delegator,
            'pelaksana' => $pelaksana
        ]);
    }

    public function simpanPembaruanTugas(Request $request, $id) {
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
                'dataTodo' => $todo
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

    public function penugasanSelesai() {
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
        ]);
    }

    public function penugasanDitolak() {
        $penugasanDitolak = DB::table('tb_todo')
                ->join('tb_pegawai as pemberi', 'tb_todo.tugas_dari', '=', 'pemberi.id')
                ->join('tb_pegawai as penerima', 'tb_todo.tugas_untuk', '=', 'penerima.id')
                ->select('tb_todo.*',
                    'pemberi.nama as nama_pemberi',
                    'penerima.nama as nama_penerima')
                ->where('keterangan', 'Ditolak')
                ->get();
        return view('admin.penugasanDitolak', [
            'penugasanDitolak' => $penugasanDitolak
        ]);
    }

    public function rincianPenugasan() {
        $ditugaskan = DB::table('tb_todo')
                ->where('keterangan', 'Ditugaskan')
                ->get();
        $diselesaikan = DB::table('tb_todo')
                ->where('keterangan', 'Selesai')
                ->get();
        $ditolak = DB::table('tb_todo')
                ->where('keterangan', 'Ditolak')
                ->get();

        return view('admin.rincianPenugasan', [
                    'ditugaskan' => $ditugaskan,
                    'diselesaikan' => $diselesaikan,
                    'ditolak' => $ditolak,
                ]);
    }
}
