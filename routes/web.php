<?php

use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('halamanUtama'); // halaman pertama kali diakses
});

//auth pengguna
Route::get('/auth/pegawai/prosesLogin', [PenggunaController::class, 'prosesLogin']);

//route admin user
Route::get('/todo/admin', [PenggunaController::class, 'adminLogin']);
Route::get('/admin/todo/dataPenugasan', [TodoController::class, 'dataPenugasan']);
Route::get('/admin/todo/penugasanBaru', [TodoController::class, 'penugasanBaru']);
Route::get('/admin/todo/simpanPenugasanBaru', [TodoController::class, 'simpanPenugasanBaru']);
Route::get('/admin/todo/ubahPenugasan/{id}', [TodoController::class, 'ubahPenugasan']);
Route::get('/admin/todo/simpanPerubahanPenugasan/{id}', [TodoController::class, 'simpanPembaruanTugas']);
Route::get('/admin/todo/hapusPenugasan/{id}', [TodoController::class, 'hapusPenugasan']);
Route::get('/admin/todo/penugasanSelesai', [TodoController::class, 'penugasanSelesai']);
Route::get('/admin/todo/penugasanDitolak', [TodoController::class, 'penugasanDitolak']);
Route::get('/admin/todo/rincianPenugasan', [TodoController::class, 'rincianPenugasan']);

//route general user
Route::get('/todo/user/login', [PenggunaController::class, 'login']);

//route todo
Route::get('/todo/mytodo', [TodoController::class, 'mytodo']);
Route::get('/todo/detailTugas/{id}', [TodoController::class, 'detailTodo']);
Route::get('/todo/perbaruiTodo/{id}', [TodoController::class, 'perbaruiTodo']);

Route::get('/todo/mytodo/selesai', [TodoController::class, 'todoSelesai']);
Route::get('/todo/mytodo/ditolak', [TodoController::class, 'todoDitolak']);
