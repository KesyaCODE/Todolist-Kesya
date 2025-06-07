<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tugas Ditolak</title>

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
    table {
      background: #fff;
      border-radius: 0.375rem;
      overflow: hidden;
      box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 0.075);
    }
  </style>
</head>
<body>
  <div class="container-md">

    <div class="d-flex flex-wrap btn-group">
      <a href="/todo/admin/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded text-center">Beranda</a>
      <a href="/admin/todo/penugasanBaru/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded text-center">Penugasan Baru</a>
      <a href="/admin/todo/penugasanSelesai/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded text-center">Tugas Selesai</a>
      <a href="/admin/todo/penugasanDitolak/{{ $adminId }}" class="btn btn-outline-primary btn-sm rounded text-center active" aria-current="page">Tugas Ditolak</a>
    </div>

    <hr />

    @if(count($penugasanDitolak) === 0)
      <div class="alert alert-info text-center" role="alert">
        Tidak ada tugas yang ditolak.
      </div>
    @else
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-nowrap">
          <thead class="table-primary text-center">
            <tr>
              <th>No.</th>
              <th>Nama Tugas</th>
              <th>Waktu Penugasan</th>
              <th>Waktu Akhir</th>
              <th>Pemberi</th>
              <th>Pelaksana</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($penugasanDitolak as $pD)
              <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $pD->tugas }}</td>
                <td>{{ $pD->waktu_mulai }}</td>
                <td>{{ $pD->waktu_selesai }}</td>
                <td>{{ $pD->nama_pemberi }}</td>
                <td>{{ $pD->nama_penerima }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif

  </div>
</body>
</html>
