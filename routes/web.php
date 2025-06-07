<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManajerController;
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

Route::get('/admin/todo/dataPenugasan/{id}', [AdminController::class, 'dataPenugasan']);
Route::get('/admin/todo/penugasanBaru/{id}', [AdminController::class, 'penugasanBaru']);
Route::get('/admin/todo/simpanPenugasanBaru/{adminId}', [AdminController::class, 'simpanPenugasanBaru']);
Route::get('/admin/todo/ubahPenugasan/{id}/{adminId}', [AdminController::class, 'ubahPenugasan']);
Route::get('/admin/todo/simpanPerubahanPenugasan/{id}/{adminId}', [AdminController::class, 'simpanPembaruanTugas']);
Route::get('/admin/todo/hapusPenugasan/{id}', [AdminController::class, 'hapusPenugasan']);
Route::get('/admin/todo/penugasanSelesai/{id}', [AdminController::class, 'penugasanSelesai']);
Route::get('/admin/todo/penugasanDitolak/{id}', [AdminController::class, 'penugasanDitolak']);
Route::get('/admin/todo/rincianPenugasan/{id}', [AdminController::class, 'rincianPenugasan']);

Route::get('/admin/todo/halamanKelolaPegawai/{adminId}', [AdminController::class, 'halamanKelolaPegawai']);
Route::get('/admin/todo/dataPegawai/{adminId}', [AdminController::class, 'dataPegawai']);
Route::get('/admin/todo/pegawai/hapusPegawai/{adminId}/{idPegawai}', [AdminController::class, 'hapusPegawai']);
Route::get('/admin/todo/pegawai/pegawaiBaru/{adminId}', [AdminController::class, 'tambahPegawai']);
Route::post('/admin/todo/pegawai/simpanPegawaiBaru/{adminId}', [AdminController::class, 'simpanPegawaiBaru']);
Route::get('/admin/todo/pegawai/ubahPegawai/{adminId}/{idPegawai}', [AdminController::class, 'ubahPegawai']);
Route::post('/admin/todo/pegawai/simpanPerubahanPegawai/{adminId}/{idPegawai}', [AdminController::class, 'simpanPerubahanPegawai']);

// route Manajer
Route::get('/todo/manajer/{id}', [PenggunaController::class, 'manajerLogin']);
Route::get('/manajer/todo/dataPenugasan/{id}', [ManajerController::class, 'dataPenugasan']);
Route::get('/manajer/todo/rincianPenugasan/{id}', [ManajerController::class, 'rincianPenugasan']);
Route::get('/manajer/todo/penugasanBaru/{id}', [ManajerController::class, 'penugasanBaru']);
Route::get('/manajer/todo/simpanPenugasanBaru', [ManajerController::class, 'simpanPenugasanBaru']);
Route::get('/manajer/todo/penugasanSelesai/{id}', [ManajerController::class, 'penugasanSelesai']);
Route::get('/manajer/todo/penugasanDitolak/{id}', [ManajerController::class, 'penugasanDitolak']);
Route::get('/manajer/todo/ubahPenugasan/{id}/{adminId}', [ManajerController::class, 'ubahPenugasan']);
Route::get('/manajer/todo/simpanPerubahanPenugasan/{id}/{adminId}', [ManajerController::class, 'simpanPembaruanTugas']);
Route::get('/manajer/todo/dataPegawai/{idManajer}', [ManajerController::class, 'dataPegawai']);

//route general user
Route::get('/todo/user/login/{id}', [PenggunaController::class, 'login']);

//route Staff
Route::get('/todo/mytodo/{id}', [TodoController::class, 'mytodo']);
Route::get('/todo/detailTugas/{id}/{idPengguna}', [TodoController::class, 'detailTodo']);
Route::get('/todo/perbaruiTodo/{id}', [TodoController::class, 'perbaruiTodo']);

Route::get('/todo/mytodo/selesai/{id}', [TodoController::class, 'todoSelesai']);
Route::get('/todo/mytodo/ditolak/{id}', [TodoController::class, 'todoDitolak']);
