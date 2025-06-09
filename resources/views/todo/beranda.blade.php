<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Beranda</title>
  <link rel="stylesheet" href="/assets/bootstrap.css" />
  <link rel="stylesheet" href="/css/staff/beranda.css" />
</head>
<body>
  <div class="container">
    <!-- Header -->
    <div class="d-flex justify-content-end align-items-center mb-3">
      <a href="/todo/mytodo/profilPengguna/{{ $detailPegawai->id }}" 
         class="btn btn-outline-success btn-sm me-2">
        {{ $detailPegawai->nama }}
      </a>
      <a href="/" class="btn btn-outline-secondary btn-sm">Keluar</a>
    </div>

    <!-- Selamat Datang -->
    <h4 class="mb-0">Selamat Datang, <b>{{ $detailPegawai->nama }}</b>!</h4>
    <p class="text-secondary mb-3">Nama Perusahaan | {{ $detailPegawai->jabatan }}</p>
    <hr>

    <!-- Kartu Tugas -->
    <div class="row g-4">
      <!-- Daftar Tugas -->
      <div class="col-md-4">
        <div class="card h-100 d-flex flex-column">
          <div class="card-body text-center d-flex flex-column">
            <div class="card-img-wrapper mb-3">
              <img src="/img/todo.png" alt="Daftar Tugas" class="img-fluid" style="max-height: 100%;">
            </div>
            <h5 class="card-title fw-semibold">Daftar Tugas</h5>
            <p class="card-text flex-grow-1">
              Daftar penugasan yang diberikan kepada anda. Silakan pilih tugas yang ingin dikerjakan.
            </p>
          </div>
          <div class="card-footer text-center">
            <a href="/todo/mytodo/{{ $detailPegawai->id }}" class="btn btn-primary btn-sm rounded-pill">Lihat Tugas</a>
          </div>
        </div>
      </div>

      <!-- Tugas Diselesaikan -->
      <div class="col-md-4">
        <div class="card h-100 d-flex flex-column">
          <div class="card-body text-center d-flex flex-column">
            <div class="card-img-wrapper mb-3">
              <img src="/img/todo_selesai.png" alt="Tugas Selesai" class="img-fluid" style="max-height: 100%;">
            </div>
            <h5 class="card-title fw-semibold">Tugas Diselesaikan</h5>
            <p class="card-text flex-grow-1">
              Tugas yang sudah anda selesaikan. Silakan pilih tugas yang ingin dilihat hasilnya.
            </p>
          </div>
          <div class="card-footer text-center">
            <a href="/todo/mytodo/selesai/{{ $detailPegawai->id }}" class="btn btn-success btn-sm rounded-pill">Tugas Selesai</a>
          </div>
        </div>
      </div>

      <!-- Tugas Ditolak -->
      <div class="col-md-4">
        <div class="card h-100 d-flex flex-column">
          <div class="card-body text-center d-flex flex-column">
            <div class="card-img-wrapper mb-3">
              <img src="/img/todo_gagal.png" alt="Tugas Ditolak" class="img-fluid" style="max-height: 100%;">
            </div>
            <h5 class="card-title fw-semibold">Tugas Ditolak</h5>
            <p class="card-text flex-grow-1">
              Tugas yang anda kerjakan tetapi ditolak oleh atasan atau anda menolak sendiri. Silakan pilih tugas yang ingin dilihat hasilnya.
            </p>
          </div>
          <div class="card-footer text-center">
            <a href="/todo/mytodo/ditolak/{{ $detailPegawai->id }}" class="btn btn-danger btn-sm rounded-pill">Tidak Diselesaikan</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
