<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Rincian ToDo</title>

  <link rel="stylesheet" href="/assets/bootstrap.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    /* Reset dan base */
    body {
      padding-top: 30px;
      background-color: #f9fafb; /* very light gray-blue */
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #4a4a4a;
      line-height: 1.5;
    }

    /* Tombol navigasi */
    .btn {
      width: 140px;
      font-weight: 600;
      border-radius: 0.5rem;
      transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
    }
    .btn-outline-primary {
      color: #4a6fa5;
      border-color: #a8bedf;
      background-color: #edf2fa;
    }
    .btn-outline-primary:hover, 
    .btn-outline-primary:focus {
      background-color: #4a6fa5;
      color: #f9fafb;
      border-color: #3c5f8d;
      box-shadow: 0 6px 12px rgb(74 111 165 / 0.3);
      outline: none;
      text-decoration: none;
    }

    /* Card */
    .card {
      border-radius: 16px;
      box-shadow: 0 8px 20px rgb(0 0 0 / 0.06);
      background-color: white;
    }
    .card-header {
      border-top-left-radius: 16px;
      border-top-right-radius: 16px;
      font-weight: 700;
      font-size: 1.25rem;
      letter-spacing: 0.04em;
      background: linear-gradient(90deg, #4a6fa5, #5a85c3);
      color: #f9fafb;
      text-align: center;
      padding: 1rem 1.5rem;
    }
    .card-body {
      padding: 1.25rem 1.5rem;
    }

    /* Tabel */
    .table {
      border-radius: 12px;
      overflow: hidden;
      box-shadow: inset 0 0 0 1px #e2e8f0;
      border-collapse: separate;
      border-spacing: 0;
      background-color: #fafbfc;
    }
    .table thead tr {
      background-color: #e4ebf8;
    }
    .table th, .table td {
      vertical-align: middle;
      padding: 0.8rem 1.2rem;
      color: #505050;
      font-weight: 600;
      font-size: 0.95rem;
    }
    .table tbody tr:hover {
      background-color: #d7e1f5;
      color: #2e3a59;
      cursor: default;
    }
    .table tbody td {
      font-weight: 500;
    }

    /* Badge */
    .badge {
      font-size: 0.9rem;
      font-weight: 600;
      padding: 0.35em 0.75em;
      border-radius: 12px;
      box-shadow: inset 0 0 5px rgb(0 0 0 / 0.07);
      user-select: none;
    }
    .bg-secondary {
      background-color: #adb5bd;
      color: #f9fafb;
    }
    .bg-success {
      background-color: #6bbf59;
      color: #f9fafb;
    }
    .bg-warning {
      background-color: #f0c25c;
      color: #4a4a4a;
    }

    /* Chart container */
    .chart-container {
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
      padding: 1.25rem 1.5rem;
      background: white;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgb(0 0 0 / 0.06);
    }
    .chart-container h5 {
      color: #4a6fa5;
      font-weight: 700;
      margin-bottom: 1rem;
      text-align: center;
      letter-spacing: 0.05em;
    }

  </style>
</head>
<body>
  <div class="container-md">
    <div class="d-flex flex-wrap gap-3 justify-content-center mb-4">
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

    <hr style="border-color: #d1d5db;" />

    <!-- Kartu Rincian ToDo -->
    <div class="card mb-4">
      <div class="card-header">
        Rincian Data ToDo
      </div>
      <div class="card-body p-0">
        <table class="table table-bordered table-hover text-center mb-0" role="table" aria-label="Rincian status tugas">
          <tbody>
            <tr>
              <td>
                <a href="/admin/todo/dataPenugasan/{{ $adminId }}" class="text-decoration-none" style="color:#4a6fa5;">
                  Ditugaskan
                </a>
              </td>
              <td>
                <span class="badge bg-secondary" aria-label="{{ count($ditugaskan) }} tugas ditugaskan">
                  {{ count($ditugaskan) }}
                </span>
              </td>
            </tr>
            <tr>
              <td>
                <a href="/admin/todo/penugasanSelesai/{{ $adminId }}" class="text-decoration-none" style="color:#4a6fa5;">
                  Diselesaikan
                </a>
              </td>
              <td>
                <span class="badge bg-success" aria-label="{{ count($diselesaikan) }} tugas selesai">
                  {{ count($diselesaikan) }}
                </span>
              </td>
            </tr>
            <tr>
              <td>
                <a href="/admin/todo/penugasanDitolak/{{ $adminId }}" class="text-decoration-none" style="color:#4a6fa5;">
                  Ditolak
                </a>
              </td>
              <td>
                <span class="badge bg-warning text-dark" aria-label="{{ count($ditolak) }} tugas ditolak">
                  {{ count($ditolak) }}
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Chart Pie -->
    <div class="chart-container mb-4">
      <h5>Statistik ToDo</h5>
      <canvas id="todoChart" aria-label="Grafik lingkaran status tugas" role="img"></canvas>
    </div>

    <script>
      const ctx = document.getElementById('todoChart').getContext('2d');
      const todoChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ['Ditugaskan', 'Diselesaikan', 'Ditolak'],
          datasets: [{
            label: 'Status ToDo',
            data: [{{ $jumlahDitugaskan }}, {{ $jumlahDiselesaikan }}, {{ $jumlahDitolak }}],
            backgroundColor: [
              'rgba(133, 146, 166, 0.7)', // soft grey-blue
              'rgba(96, 179, 114, 0.7)',  // soft green
              'rgba(244, 194, 91, 0.7)'   // soft yellow
            ],
            borderColor: [
              'rgba(133, 146, 166, 1)',
              'rgba(96, 179, 114, 1)',
              'rgba(244, 194, 91, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'bottom',
              labels: {
                color: '#4a4a4a',
                font: { size: 14, weight: '600' }
              }
            },
            tooltip: {
              backgroundColor: 'rgba(74, 111, 165, 0.85)',
              titleColor: '#f9fafb',
              bodyColor: '#f9fafb',
              cornerRadius: 6,
              padding: 10
            }
          }
        }
      });
    </script>

  </div>
</body>
</html>
