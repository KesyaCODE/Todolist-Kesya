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
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #343a40;
    }

    .btn-group {
      margin-bottom: 1rem;
      gap: 0.5rem;
      flex-wrap: wrap;
    }

    .btn-group .btn {
      min-width: 140px;
    }

    /* Tabel styling */
    table {
      border-collapse: separate;
      border-spacing: 0 6px; /* jarak antar baris */
      width: 100%;
      font-size: 0.95rem;
    }

    thead th {
      background-color: #d0e7ff; /* biru soft yang netral */
      color: #0a3d62;
      font-weight: 600;
      padding: 14px 12px;
      border-radius: 8px;
      text-align: center;
      border-bottom: 2px solid #0a3d62;
      user-select: none;
    }

    tbody tr {
      background-color: #ffffff;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
      transition: background-color 0.3s ease;
      border-radius: 8px;
    }

    tbody tr:hover {
      background-color: #e3f2fd;
      cursor: pointer;
    }

    tbody tr:nth-child(odd) {
      background-color: #f9fbff;
    }

    tbody td {
      padding: 12px 14px;
      vertical-align: middle;
      border: none;
      color: #495057;
    }

    tbody td.text-center {
      text-align: center;
      font-variant-numeric: tabular-nums;
    }

    /* Hilangkan garis border di tabel supaya lebih ringan */
    table, thead, tbody, tr, th, td {
      border: none;
    }

    /* Pesan kosong */
    .empty-message {
      padding: 20px 0;
      font-style: italic;
      color: #6c757d;
    }
  </style>
</head>
<body>
  <div class="container-md">
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

    <div class="table-responsive">
      <table>
        <thead>
          <tr>
            <th style="width: 50px;">No.</th>
            <th style="min-width: 220px; text-align: left;">Nama Tugas</th>
            <th style="width: 140px;">Waktu Penugasan</th>
            <th style="width: 140px;">Waktu Selesai</th>
            <th style="min-width: 130px; text-align: left;">Pemberi</th>
            <th style="min-width: 130px; text-align: left;">Pelaksana</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($penugasanSelesai as $ps)
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td style="text-align: left;">{{ $ps->tugas }}</td>
              <td class="text-center">{{ $ps->waktu_mulai }}</td>
              <td class="text-center">{{ $ps->waktu_selesai }}</td>
              <td style="text-align: left;">{{ $ps->nama_pemberi }}</td>
              <td style="text-align: left;">{{ $ps->nama_penerima }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="empty-message text-center">Belum ada tugas selesai.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
