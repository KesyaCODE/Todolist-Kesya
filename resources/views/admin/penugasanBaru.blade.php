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
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #343a40;
    }
    .btn-group {
      margin-bottom: 1rem;
      gap: 0.5rem;
      flex-wrap: wrap;
      display: flex;
      justify-content: center;
    }
    .btn-group .btn {
      min-width: 140px;
      width: 140px; /* supaya tombol fixed size sama seperti sebelumnya */
    }

    hr {
      border-top: 2px solid #cfe2ff;
      margin-bottom: 2rem;
    }
    h4 {
      color: #0a3d62;
      font-weight: 600;
      margin-bottom: 1.5rem;
      user-select: none;
    }
    form {
      background: #ffffff;
      padding: 2rem 2.5rem;
      border-radius: 0.5rem;
      box-shadow: 0 0.25rem 0.5rem rgb(0 0 0 / 0.08);
      max-width: 600px;
      margin: 0 auto 3rem;
    }
    label {
      font-weight: 600;
      color: #1e293b;
    }
    .form-control, .form-select {
      border-radius: 0.375rem;
      border: 1.5px solid #ced4da;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
      font-size: 1rem;
      padding: 0.5rem 0.75rem;
    }
    .form-control:focus, .form-select:focus {
      border-color: #4dabf7;
      box-shadow: 0 0 0 0.25rem rgb(77 171 247 / 0.25);
      outline: none;
    }
    .invalid-feedback {
      font-size: 0.875rem;
      color: #dc3545;
    }
    .text-end button {
      background-color: #4dabf7;
      border-color: #4dabf7;
      font-weight: 600;
      border-radius: 0.5rem;
      padding: 0.6rem 1.8rem;
      transition: background-color 0.3s ease;
      user-select: none;
    }
    .text-end button:hover {
      background-color: #3a8ddb;
      border-color: #3a8ddb;
    }
  </style>
</head>
<body>
  <div class="container-sm">

    <!-- Navigation Buttons -->
    <div class="btn-group mb-4">
      <a href="/todo/admin/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded">
        Beranda
      </a>
      <a href="/admin/todo/penugasanBaru/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded">
        Penugasan Baru
      </a>
      <a href="/admin/todo/penugasanSelesai/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded">
        Tugas Selesai
      </a>
      <a href="/admin/todo/penugasanDitolak/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded">
        Tugas Ditolak
      </a>
    </div>

    <hr />

    <h4 class="text-center">Form Penugasan Baru</h4>

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
