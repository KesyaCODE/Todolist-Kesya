<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Penugasan Baru</title>

  <link rel="stylesheet" href="/assets/bootstrap.css" />
  <style>
    body {
      padding-top: 25px;
      background-color: #f8f9fa;
    }
  </style>
</head>
<body>
  <div class="container-sm">

    <!-- Navigation Buttons -->
    <div class="d-flex flex-wrap gap-2 justify-content-center mb-4">
      <a href="/todo/admin/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded" style="width: 140px;">
        Beranda
      </a>
      <a href="/admin/todo/penugasanBaru/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded" style="width: 140px;">
        Penugasan Baru
      </a>
      <a href="/admin/todo/penugasanSelesai/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded" style="width: 140px;">
        Tugas Selesai
      </a>
      <a href="/admin/todo/penugasanDitolak/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded" style="width: 140px;">
        Tugas Ditolak
      </a>
    </div>

    <hr />

    <h4 class="text-center mb-4">Form Penugasan Baru</h4>

    <form action="/admin/todo/simpanPenugasanBaru/{{ $adminId }}" method="get" class="needs-validation" novalidate>
      @csrf
      <div class="mb-3 row">
        <label for="namaTodo" class="col-sm-3 col-form-label">Nama Tugas</label>
        <div class="col-sm-9">
          <input
            type="text"
            id="namaTodo"
            name="namaTodo"
            class="form-control"
            placeholder="Masukkan nama tugas"
            required
          />
          <div class="invalid-feedback">Nama tugas wajib diisi.</div>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="tanggalMulai" class="col-sm-3 col-form-label">Waktu Mulai</label>
        <div class="col-sm-9">
          <input
            type="date"
            id="tanggalMulai"
            name="tanggalMulai"
            class="form-control"
            required
          />
          <div class="invalid-feedback">Tanggal mulai wajib dipilih.</div>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="tanggalSelesai" class="col-sm-3 col-form-label">Waktu Selesai</label>
        <div class="col-sm-9">
          <input
            type="date"
            id="tanggalSelesai"
            name="tanggalSelesai"
            class="form-control"
            required
          />
          <div class="invalid-feedback">Tanggal selesai wajib dipilih.</div>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="pemberiTugas" class="col-sm-3 col-form-label">Delegator</label>
        <div class="col-sm-9">
          <select id="pemberiTugas" name="pemberiTugas" class="form-select" required>
            <option value="" disabled selected>Pilih delegator</option>
            @foreach ($namaDelegator as $nd)
            <option value="{{ $nd->id }}" {{ $nd->id == $adminId ? 'selected' : '' }}>{{ $nd->nama }}</option>
            @endforeach
          </select>
          <div class="invalid-feedback">Delegator wajib dipilih.</div>
        </div>
      </div>

      <div class="mb-4 row">
        <label for="namaPenugas" class="col-sm-3 col-form-label">Pelaksana</label>
        <div class="col-sm-9">
          <select id="namaPenugas" name="namaPenugas" class="form-select" required>
            <option value="" disabled selected>Pilih pelaksana</option>
            @foreach ($namaPelaksana as $np)
            <option value="{{ $np->id }}">{{ $np->nama }}</option>
            @endforeach
          </select>
          <div class="invalid-feedback">Pelaksana wajib dipilih.</div>
        </div>
      </div>

      <div class="text-end">
        <button type="submit" class="btn btn-primary btn-lg px-4">
          Tugaskan!
        </button>
      </div>
    </form>
  </div>

  <script>
    // Bootstrap form validation
    (() => {
      'use strict';
      const forms = document.querySelectorAll('.needs-validation');
      Array.from(forms).forEach(form => {
        form.addEventListener(
          'submit',
          event => {
            if (!form.checkValidity()) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          },
          false
        );
      });
    })();
  </script>
</body>
</html>
