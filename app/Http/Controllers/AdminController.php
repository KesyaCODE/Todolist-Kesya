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

    public function simpanPenugasanBaru(Request $request, $adminId) {
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
            'dataTodo' => $semuaTodo,
            'adminId' => $adminId // id admin yang login
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

    public function hapusPegawai($adminId, $idPegawai) {
        // hapus tugas ( todo ) milik idPegawai
        DB::table('tb_todo')
            ->where('tugas_untuk', $idPegawai)
            ->orWhere('tugas_dari', $idPegawai)
            ->delete();
        
        // hapus data login berdasarkan idPegawai, jika data ada
        if (DB::table('tb_login')->where('id', $idPegawai)->exists()) {
            DB::table('tb_login')
                ->where('id', $idPegawai)
                ->delete();
        }


        // hapus pegawai berdasarkan id
        DB::table('tb_pegawai')
            ->where('id', $idPegawai)
            ->delete();

        // ambil data pegawai keseluruhan
        $dataPegawai = DB::table('tb_pegawai')
                        ->where('jabatan', '!=', "CEO")
                        ->get();

        // kembali ke halaman kelola pegawai
        return redirect('/admin/todo/dataPegawai/' . $adminId)->with([
            'dataPegawai' => $dataPegawai,
            'adminId' => $adminId // id admin yang login
        ]);
    }

    public function tambahPegawai($adminId) {
        return view('admin.pegawai.tambahPegawai', [
            'adminId' => $adminId // id admin yang login
        ]);
    }

    public function simpanPegawaiBaru(Request $request, $adminId) {
        //simpan data pegawai baru
        DB::table('tb_pegawai')
            ->insert([
                'nama' => $request->namaPegawai,
                'jabatan' => $request->jabatanPegawai,
            ]);

            // ambil id pegawai yang baru saja ditambahkan
            $idPegawaiBaru = DB::getPdo()->lastInsertId();

            DB::table('tb_login')
            ->insert([
                'id' => $idPegawaiBaru,
                'nama_pengguna' => $request->namaPengguna,
                'kata_sandi' => $request->kataSandi,
            ]);

        // ambil data pegawai keseluruhan
        $dataPegawai = DB::table('tb_pegawai')
                        ->where('jabatan', '!=', "CEO")
                        ->get();

        return redirect('/admin/todo/dataPegawai/' . $adminId)->with([
            'dataPegawai' => $dataPegawai,
            'adminId' => $adminId // id admin yang login
        ]);
    }

    public function ubahPegawai($adminId, $idPegawai) {
        $pegawai = DB::table('tb_pegawai')
                    ->where('id', $idPegawai)
                    ->first();
        $pegawaiLogin = DB::table('tb_login')
                    ->where('id', $idPegawai)
                    ->first();

        return view('admin.pegawai.ubahPegawai', [
            'pegawai' => $pegawai,
            'pegawaiLogin' => $pegawaiLogin,
            'adminId' => $adminId // id admin yang login
        ]);
    }

    public function simpanPerubahanPegawai(Request $request, $adminId, $idPegawai) {
        // update data pegawai
        DB::table('tb_pegawai')
            ->where('id', $idPegawai)
            ->update([
                'nama' => $request->ubahNamaPegawai,
                'jabatan' => $request->ubahJabatanPegawai,
            ]);

        $cek_userlogin = DB::table('tb_login')
                    ->where('id', $idPegawai)->first();

        if ($cek_userlogin) {
            // Update jika data sudah ada
            DB::table('tb_login')
                ->where('id_pegawai', $idPegawai)
                ->update([
                    'nama_pengguna' => $request->ubahNamaPengguna,
                    'kata_sandi' => $request->ubahKataSandi,
                ]);
        } else {
            // Insert jika data belum ada
            DB::table('tb_login')->insert([
                'id' => $idPegawai,
                'nama_pengguna' => $request->ubahNamaPengguna,
                'kata_sandi' => $request->ubahKataSandi,
            ]);
        }

        // ambil data pegawai keseluruhan
        $dataPegawai = DB::table('tb_pegawai')
                        ->where('jabatan', '!=', "CEO")
                        ->get();

        return redirect('/admin/todo/dataPegawai/' . $adminId)->with([
            'dataPegawai' => $dataPegawai,
            'adminId' => $adminId // id admin yang login
        ]);
    }
}
