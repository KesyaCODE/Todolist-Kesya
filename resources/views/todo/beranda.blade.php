<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Beranda</title>
  <link rel="stylesheet" href="/assets/bootstrap.css" />
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding-top: 20px;
      background-color: #f2f4f6;
      color: #333;
    }

    .card {
      border: none;
      border-radius: 1rem;
      transition: transform 0.2s ease, box-shadow 0.3s ease;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .card-img-wrapper {
      height: 150px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card-text {
      min-height: 80px;
      color: #555;
      font-size: 0.95rem;
    }

    .btn {
      width: auto;
      padding: 0.4rem 1rem;
      font-size: 0.85rem;
      transition: background-color 0.2s ease, color 0.2s ease;
    }

    .btn:hover {
      opacity: 0.9;
    }

    .btn-primary {
      background-color: #4a6cf7;
      border: none;
    }

    .btn-success {
      background-color: #2bb673;
      border: none;
    }

    .btn-danger {
      background-color: #e14d4d;
      border: none;
    }

    .btn-outline-success,
    .btn-outline-secondary {
      border-radius: 50px;
    }

    .btn-outline-success:hover {
      background-color: #2bb673;
      color: white;
    }

    .btn-outline-secondary:hover {
      background-color: #adb5bd;
      color: white;
    }

    .card-footer {
      background-color: transparent;
    }

    h4 {
      color: #343a40;
    }

    hr {
      border-top: 1px solid #dee2e6;
    }
  </style>
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
    <p class="text-secondary mb-3">{{ $detailPegawai->jabatan }}</p>
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
