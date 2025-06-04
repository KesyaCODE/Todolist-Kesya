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
        <p align="right"><a class="link-offset-2 link-underline link-underline-opacity-0 border border-primary rounded px-3 py-2" href="/">Keluar</a></p>
        Selamat Datang, <b>{{ $detailPegawai->nama }}!</b>
        <hr>

        <div class="card-group">
        <div class="card">
            <img src="/img/todo.png" class="card-img-top mx-auto d-block img-fluid" style="max-width: 50%; height: auto;">
            <div class="card-body">
            <h5 class="card-title">Daftar Tugas</h5>
            <p class="card-text">
                Daftar penugasan yang diberikan kepada anda. Silahkan pilih tugas yang ingin dikerjakan.
            </p>
            </div>
            <div class="card-footer">
            <small class="text-body-secondary">
                <a href="/todo/mytodo/{{ $detailPegawai->id }}" class="card-link">
                    Lihat Tugas Saya!
                </a>
            </small>
            </div>
        </div>

        <div class="card">
            <img src="/img/todo_selesai.png" class="card-img-top mx-auto d-block img-fluid" style="max-width: 50%; height: auto;">
            <div class="card-body">
                <h5 class="card-title">Tugas Diselesaikan</h5>
                <p class="card-text">
                    Tugas yang sudah anda selesaikan. Silahkan pilih tugas yang ingin dilihat hasilnya.
                </p>
            </div>
            <div class="card-footer">
                <small class="text-body-secondary">
                    <a href="/todo/mytodo/selesai/{{ $detailPegawai->id }}" class="card-link">
                        Tugas Selesai
                    </a>
                </small>
            </div>
        </div>

        <div class="card">
            <img src="/img/todo_gagal.png" class="card-img-top mx-auto d-block img-fluid" style="max-width: 50%; height: auto;">
            <div class="card-body">
            <h5 class="card-title">Tugas Ditolak</h5>
            <p class="card-text">
                Tugas yang sudah anda kerjakan tetapi ditolak oleh atasan atau anda menolak sendiri. Silahkan pilih tugas yang ingin dilihat hasilnya.
            </p>
            </div>
            <div class="card-footer">
            <small class="text-body-secondary">
                <a href="/todo/mytodo/ditolak/{{ $detailPegawai->id }}">
                    Tidak Diselesaikan
                </a>
            </small>
            </div>
        </div>
</div>
    </div>
</body>
</html>