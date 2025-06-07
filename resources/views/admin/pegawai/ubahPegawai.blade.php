<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Ubah Data Pegawai</title>
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
      box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.05);
    }
    .form-label {
      font-weight: 500;
    }
  </style>
</head>
<body>
  <div class="container-lg">

    <!-- Navigasi -->
    <div class="d-flex flex-wrap gap-2 mb-4">
      {{-- <a href="/todo/admin/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded-pill btn-nav">Beranda</a> --}}
      <a href="/admin/todo/halamanKelolaPegawai/{{ $adminId }}" class="btn btn-outline-success rounded-pill btn-custom">
        Halaman Kepegawaian
      </a>
      <a href="/admin/todo/pegawai/pegawaiBaru/{{ $adminId }}" class="btn btn-outline-success rounded-pill btn-custom">
        Pegawai Baru
      </a>
    </div>

    <!-- Form Ubah Pegawai -->
    <div class="card">
      <div class="card-header bg-success text-white text-center fw-bold">
        Ubah Data Pegawai
      </div>
      <div class="card-body">
        <form action="/admin/todo/pegawai/simpanPerubahanPegawai/{{ $adminId }}/{{ $pegawai->id }}" method="post">
          @csrf

          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">ID Pegawai</label>
            <div class="col-sm-9">
              <input type="text" class="form-control-plaintext" readonly value="{{ $pegawai->id }}">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="ubahNamaPegawai" class="col-sm-3 col-form-label">Nama Pegawai</label>
            <div class="col-sm-9">
              <input type="text" id="ubahNamaPegawai" name="ubahNamaPegawai" class="form-control" value="{{ $pegawai->nama }}" required>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="ubahJabatanPegawai" class="col-sm-3 col-form-label">Jabatan</label>
            <div class="col-sm-9">
              <select id="ubahJabatanPegawai" name="ubahJabatanPegawai" class="form-select">
                <option selected value="{{ $pegawai->jabatan }}">{{ $pegawai->jabatan }}</option>
                @foreach (['CEO', 'Manajer', 'Staff'] as $jabatan)
                  @if ($jabatan !== $pegawai->jabatan)
                    <option value="{{ $jabatan }}">{{ $jabatan }}</option>
                  @endif
                @endforeach
              </select>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="ubahNamaPengguna" class="col-sm-3 col-form-label">Nama Pengguna</label>
            <div class="col-sm-9">
              <input type="text" id="ubahNamaPengguna" name="ubahNamaPengguna" class="form-control" value="{{ $pegawaiLogin->nama_pengguna ?? '' }}" required>
            </div>
          </div>

          <div class="mb-4 row">
            <label for="ubahKataSandi" class="col-sm-3 col-form-label">Kata Sandi</label>
            <div class="col-sm-9">
              <input type="text" id="ubahKataSandi" name="ubahKataSandi" class="form-control" value="{{ $pegawaiLogin->kata_sandi ?? '' }}" required>
            </div>
          </div>

          <div class="text-end">
            <button type="submit" class="btn btn-success px-4 rounded-pill">Simpan Pembaruan</button>
          </div>
        </form>
      </div>
    </div>
    
  </div>
</body>
</html>
