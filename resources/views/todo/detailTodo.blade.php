<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detail To Do</title>
  <link rel="stylesheet" href="/assets/bootstrap.css" />
  <style>
    body {
      padding-top: 30px;
      background-color: #f8f9fa;
    }
    .breadcrumb a {
      font-size: 0.9rem;
    }
    .form-label {
      font-weight: 500;
    }
    .card {
      max-width: 600px;
      margin: auto;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb" class="mb-4 text-center">
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item">
          <a href="/todo/user/login/{{ $idPengguna }}" class="btn btn-outline-primary btn-sm">Beranda</a>
        </li>
        <li class="breadcrumb-item">
          <a href="/todo/mytodo/selesai/{{ $idPengguna }}" class="btn btn-outline-primary btn-sm">Tugas Selesai</a>
        </li>
        <li class="breadcrumb-item">
          <a href="/todo/mytodo/ditolak/{{ $idPengguna }}" class="btn btn-outline-primary btn-sm">Tugas Ditolak</a>
        </li>
      </ol>
    </nav>

    <!-- Detail Card -->
    @foreach ($detailTodo as $detail)
    <div class="card shadow-sm mb-4">
      <div class="card-header bg-primary text-white text-center fw-bold">
        Detail Tugas
      </div>
      <div class="card-body">
        <form action="/todo/perbaruiTodo/{{ $detail->id }}" method="get">
          <div class="mb-3">
            <label class="form-label">Nama Tugas</label>
            <input type="text" class="form-control" value="{{ $detail->tugas }}" readonly>
          </div>
          <div class="mb-3">
            <label class="form-label">Waktu Mulai</label>
            <input type="text" class="form-control" value="{{ $detail->waktu_mulai }}" readonly>
          </div>
          <div class="mb-3">
            <label class="form-label">Waktu Selesai</label>
            <input type="text" class="form-control" value="{{ $detail->waktu_selesai }}" readonly>
          </div>
          <div class="mb-3">
            <label class="form-label">Penugasan Oleh</label>
            <input type="text" class="form-control" value="{{ $detail->pemberi_tugas }}" readonly>
          </div>
          <div class="mb-4">
            <label class="form-label">Status</label>
            <select class="form-select" name="statusPekerjaan">
              <option value="{{ $detail->keterangan }}" selected>{{ $detail->keterangan }}</option>
              <option value="Dikerjakan">Dikerjakan</option>
              <option value="Ditolak">Ditolak</option>
              <option value="Selesai">Selesai</option>
            </select>
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-success">Perbarui</button>
          </div>
        </form>
      </div>
