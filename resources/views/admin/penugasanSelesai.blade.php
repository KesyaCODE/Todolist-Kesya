<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ToDo Selesai</title>

  <link rel="stylesheet" href="/assets/bootstrap.css" />
  <style>
    body {
      padding-top: 20px;
      background-color: #f8f9fa;
    }
    .btn-group {
      margin-bottom: 1rem;
      gap: 0.5rem;
      flex-wrap: wrap;
    }
    .btn-group .btn {
      min-width: 140px;
    }
  </style>
</head>
<body>
  <div class="container-md">

    <div class="d-flex flex-wrap btn-group">
      <a href="/todo/admin/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded text-center">Beranda</a>
      <a href="/admin/todo/penugasanBaru/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded text-center">Penugasan Baru</a>
      <a href="/admin/todo/penugasanSelesai/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded text-center active" aria-current="page">Tugas Selesai</a>
      <a href="/admin/todo/penugasanDitolak/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded text-center">Tugas Ditolak</a>
    </div>

    <hr />

    <div class="table-responsive">
      <table class="table table-bordered border-primary table-striped table-hover table-sm align-middle">
        <thead class="table-primary text-center">
          <tr>
            <th>No.</th>
            <th>Nama Tugas</th>
            <th>Waktu Penugasan</th>
            <th>Waktu Selesai</th>
            <th>Pemberi</th>
            <th>Pelaksana</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($penugasanSelesai as $ps)
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>{{ $ps->tugas }}</td>
              <td class="text-center">{{ $ps->waktu_mulai }}</td>
              <td class="text-center">{{ $ps->waktu_selesai }}</td>
              <td>{{ $ps->nama_pemberi }}</td>
              <td>{{ $ps->nama_penerima }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center text-muted fst-italic">Belum ada tugas selesai.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>
</body>
</html>
