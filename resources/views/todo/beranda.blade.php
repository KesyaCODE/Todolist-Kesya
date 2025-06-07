<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Beranda</title>
  <link rel="stylesheet" href="/assets/bootstrap.css" />
  <style>
    body {
      padding-top: 20px;
      background-color: #f8f9fa;
    }

    .card-img-wrapper {
      height: 150px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card-text {
      min-height: 80px;
    }

    .card {
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }

    .btn {
      width: 140px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="d-flex justify-content-end align-items-center mb-3">
      <a href="/todo/mytodo/profilPengguna/{{ $detailPegawai->id }}" 
         class="btn btn-outline-success btn-sm rounded-pill me-2">
        {{ $detailPegawai->nama }}
      </a>
      <a href="/" class="btn btn-outline-secondary btn-sm rounded-pill">Keluar</a>
    </div>


    <!-- Selamat Datang -->
    <h4 class="mb-0">Selamat Datang, <b>{{ $detailPegawai->nama }}</b>!</h4>
    <p class="text-secondary mb-3">{{ $detailPegawai->jabatan }}</p>
    <hr>

    <!-- Kartu Tugas -->
    <div class="row g-4">
      <!-- Daftar Tugas -->
      <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0 d-flex flex-column">
          <div class="card-body text-center d-flex flex-column">
            <div class="card-img-wrapper mb-3">
              <img src="/img/todo.png" alt="Daftar Tugas" class="img-fluid" style="max-height: 100%;">
            </div>
            <h5 class="card-title fw-bold">Daftar Tugas</h5>
            <p class="card-text flex-grow-1">
              Daftar penugasan yang diberikan kepada anda. Silahkan pilih tugas yang ingin dikerjakan.
            </p>
          </div>
          <div class="card-footer bg-white border-0 text-center">
            <a href="/todo/mytodo/{{ $detailPegawai->id }}" class="btn btn-primary btn-sm rounded-pill">Lihat Tugas</a>
          </div>
        </div>
      </div>

      <!-- Tugas Diselesaikan -->
      <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0 d-flex flex-column">
          <div class="card-body text-center d-flex flex-column">
            <div class="card-img-wrapper mb-3">
              <img src="/img/todo_selesai.png" alt="Tugas Selesai" class="img-fluid" style="max-height: 100%;">
            </div>
            <h5 class="card-title fw-bold">Tugas Diselesaikan</h5>
            <p class="card-text flex-grow-1">
              Tugas yang sudah anda selesaikan. Silahkan pilih tugas yang ingin dilihat hasilnya.
            </p>
          </div>
          <div class="card-footer bg-white border-0 text-center">
            <a href="/todo/mytodo/selesai/{{ $detailPegawai->id }}" class="btn btn-success btn-sm rounded-pill">Tugas Selesai</a>
          </div>
        </div>
      </div>

      <!-- Tugas Ditolak -->
      <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0 d-flex flex-column">
          <div class="card-body text-center d-flex flex-column">
            <div class="card-img-wrapper mb-3">
              <img src="/img/todo_gagal.png" alt="Tugas Ditolak" class="img-fluid" style="max-height: 100%;">
            </div>
            <h5 class="card-title fw-bold">Tugas Ditolak</h5>
            <p class="card-text flex-grow-1">
              Tugas yang anda kerjakan tetapi ditolak oleh atasan atau anda menolak sendiri. Silahkan pilih tugas yang ingin dilihat hasilnya.
            </p>
          </div>
          <div class="card-footer bg-white border-0 text-center">
            <a href="/todo/mytodo/ditolak/{{ $detailPegawai->id }}" class="btn btn-danger btn-sm rounded-pill">Tidak Diselesaikan</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
