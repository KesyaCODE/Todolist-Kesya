<?php

use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('halamanUtama'); // halaman pertama kali diakses
});

//auth pengguna
Route::post('/auth/pegawai/prosesLogin', [PenggunaController::class, 'prosesLogin']);

//route admin user
Route::get('/todo/admin/{id}', [PenggunaController::class, 'adminLogin']); // masuk halaman admin, tanpa autentikasi

Route::get('/admin/todo/dataPenugasan/{id}', [TodoController::class, 'dataPenugasan']);
Route::get('/admin/todo/penugasanBaru/{id}', [TodoController::class, 'penugasanBaru']);
Route::get('/admin/todo/simpanPenugasanBaru', [TodoController::class, 'simpanPenugasanBaru']);
Route::get('/admin/todo/ubahPenugasan/{id}/{adminId}', [TodoController::class, 'ubahPenugasan']);
Route::get('/admin/todo/simpanPerubahanPenugasan/{id}/{adminId}', [TodoController::class, 'simpanPembaruanTugas']);
Route::get('/admin/todo/hapusPenugasan/{id}', [TodoController::class, 'hapusPenugasan']);
Route::get('/admin/todo/penugasanSelesai/{id}', [TodoController::class, 'penugasanSelesai']);
Route::get('/admin/todo/penugasanDitolak/{id}', [TodoController::class, 'penugasanDitolak']);
Route::get('/admin/todo/rincianPenugasan/{id}', [TodoController::class, 'rincianPenugasan']);

//route general user
Route::get('/todo/user/login/{id}', [PenggunaController::class, 'login']);

//route todo
Route::get('/todo/mytodo/{id}', [TodoController::class, 'mytodo']);
Route::get('/todo/detailTugas/{id}/{idPengguna}', [TodoController::class, 'detailTodo']);
Route::get('/todo/perbaruiTodo/{id}', [TodoController::class, 'perbaruiTodo']);

Route::get('/todo/mytodo/selesai/{id}', [TodoController::class, 'todoSelesai']);
Route::get('/todo/mytodo/ditolak/{id}', [TodoController::class, 'todoDitolak']);
