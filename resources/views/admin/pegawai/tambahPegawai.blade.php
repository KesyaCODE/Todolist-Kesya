<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pegawai Baru</title>
  <link rel="stylesheet" href="/assets/bootstrap.css" />
  <style>
    body {
      background-color: #f8f9fa;
      padding-top: 30px;
    }
    .btn-nav {
      width: 160px;
    }
    .card {
      border-radius: 15px;
      box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075);
    }
    .form-label {
      font-weight: 500;
    }
  </style>
</head>
<body>
  <div class="container-lg">

    <!-- Tombol Navigasi -->
    <div class="d-flex flex-wrap gap-2 mb-4">
      <a href="/todo/admin/{{ $adminId }}" class="btn btn-outline-primary rounded-pill btn-sm btn-nav">Beranda</a>
      <a href="/admin/todo/halamanKelolaPegawai/{{ $adminId }}" class="btn btn-outline-secondary rounded-pill btn-sm btn-nav">Halaman Kepegawaian</a>
      <a href="/admin/todo/pegawai/pegawaiBaru/{{ $adminId }}" class="btn btn-outline-success rounded-pill btn-sm btn-nav">Pegawai Baru</a>
    </div>

    <!-- Form Tambah Pegawai -->
    <div class="card">
      <div class="card-header bg-primary text-white fw-bold text-center">
        Tambah Pegawai Baru
      </div>
      <div class="card-body">
        <form action="/admin/todo/pegawai/simpanPegawaiBaru/{{ $adminId }}" method="post">
          @csrf
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Pegawai</label>
            <input type="text" class="form-control form-control-sm" id="nama" name="namaPegawai" required />
          </div>

          <div class="mb-3">
            <label for="jabatanPegawai" class="form-label">Jabatan</label>
            <select class="form-select form-select-sm" id="jabatanPegawai" name="jabatanPegawai">
              <option value="CEO">CEO</option>
              <option value="Manajer">Manajer</option>
              <option value="Staff" selected>Staff</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="namaPengguna" class="form-label">Nama Pengguna</label>
            <input type="text" class="form-control form-control-sm" id="namaPengguna" name="namaPengguna" required />
          </div>

          <div class="mb-3">
            <label for="kataSandi" class="form-label">Kata Sandi</label>
            <input type="password" class="form-control form-control-sm" id="kataSandi" name="kataSandi" required />
          </div>

          <div class="text-end">
            <button type="submit" class="btn btn-primary rounded-pill px-4">Simpan</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</body>
</html>
