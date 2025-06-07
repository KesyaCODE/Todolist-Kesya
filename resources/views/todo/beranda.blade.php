<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>

    <link rel="stylesheet" type="text/css" href="/assets/bootstrap.css">
    <style>
        /* Menambahkan margin atau padding pada body */
        body {
            padding-top: 15px; /* Menambahkan jarak atas */
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- rencana buat dalam bentuk session atau log out betulan -->
        <p align="right">
            <a class="d-inline-block text-decoration-none border border-primary rounded px-2 py-1 fs-7 text-center" style="min-width: 110px;" href="/">Keluar</a>
        </p>

        Selamat Datang, <b>{{ $detailPegawai->nama }}!</b><br>
        <font size="2" class="text-secondary">
            {{ $detailPegawai->jabatan }}
        </font>
        <hr>

        <div class="card-group">
        <div class="card">
            <img src="/img/todo.png" class="card-img-top mx-auto d-block img-fluid" style="max-width: 50%; height: auto;">
            <div class="card-body">
            <h5 class="card-title">Daftar Tugas</h5>
            <p class="card-text small">
                Daftar penugasan yang diberikan kepada anda. Silahkan pilih tugas yang ingin dikerjakan.
            </p>
            </div>
            <div class="card-footer">
            <small class="text-body-secondary">
                <a href="/todo/mytodo/{{ $detailPegawai->id }}" class="card-link text-decoration-none">
                    Lihat Tugas
                </a>
            </small>
            </div>
        </div>

        <div class="card">
            <img src="/img/todo_selesai.png" class="card-img-top mx-auto d-block img-fluid" style="max-width: 50%; height: auto;">
            <div class="card-body">
                <h5 class="card-title">Tugas Diselesaikan</h5>
                <p class="card-text small">
                    Tugas yang sudah anda selesaikan. Silahkan pilih tugas yang ingin dilihat hasilnya.
                </p>
            </div>
            <div class="card-footer">
                <small class="text-body-secondary">
                    <a href="/todo/mytodo/selesai/{{ $detailPegawai->id }}" class="card-link text-decoration-none">
                        Tugas Selesai
                    </a>
                </small>
            </div>
        </div>

        <div class="card">
            <img src="/img/todo_gagal.png" class="card-img-top mx-auto d-block img-fluid" style="max-width: 50%; height: auto;">
            <div class="card-body">
            <h5 class="card-title">Tugas Ditolak</h5>
            <p class="card-text small">
                Tugas yang sudah anda kerjakan tetapi ditolak oleh atasan atau anda menolak sendiri. Silahkan pilih tugas yang ingin dilihat hasilnya.
            </p>
            </div>
            <div class="card-footer">
            <small class="text-body-secondary">
                <a href="/todo/mytodo/ditolak/{{ $detailPegawai->id }}" class="card-link text-decoration-none">
                    Tidak Diselesaikan
                </a>
            </small>
            </div>
        </div>
</div>
    </div>
</body>
</html>