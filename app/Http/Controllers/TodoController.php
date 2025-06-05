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

    public function detailTodo($id, $idPengguna) {
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
            'detailTodo' => $detailTodo,
            'idPengguna' => $idPengguna // id pengguna yang login
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
}
