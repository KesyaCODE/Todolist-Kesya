<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Rincian ToDo</title>

  <link rel="stylesheet" href="/assets/bootstrap.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    body {
      padding-top: 30px;
      background-color: #f8f9fa;
    }
    .card {
      border-radius: 12px;
      box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
    .badge {
      font-size: 0.9rem;
    }
    .table td, .table th {
      vertical-align: middle;
    }
    .chart-container {
      max-width: 600px;
      margin: 0 auto;
    }
  </style>
</head>
<body>
  <div class="container-md">

    <!-- Tombol Beranda -->
    {{-- <div class="mb-4">
      <a href="/todo/admin/{{ $adminId }}" class="btn btn-outline-primary rounded-pill px-4">Beranda</a>
    </div> --}}
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
    <hr>

    <!-- Kartu Rincian ToDo -->
    <div class="card mb-4">
      <div class="card-header bg-primary text-white text-center">
        <strong>Rincian Data ToDo</strong>
      </div>
      <div class="card-body p-0">
        <table class="table table-bordered table-hover text-center mb-0">
          <tbody>
            <tr>
              <td>
                <a href="/admin/todo/dataPenugasan/{{ $adminId }}" class="text-decoration-none">Ditugaskan</a>
              </td>
              <td>
                <span class="badge bg-secondary">
                  {{ count($ditugaskan) }}
                </span>
              </td>
            </tr>
            <tr>
              <td>
                <a href="/admin/todo/penugasanSelesai/{{ $adminId }}" class="text-decoration-none">Diselesaikan</a>
              </td>
              <td>
                <span class="badge bg-success">
                  {{ count($diselesaikan) }}
                </span>
              </td>
            </tr>
            <tr>
              <td>
                <a href="/admin/todo/penugasanDitolak/{{ $adminId }}" class="text-decoration-none">Ditolak</a>
              </td>
              <td>
                <span class="badge bg-warning text-dark">
                  {{ count($ditolak) }}
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Chart Pie -->
    <div class="card chart-container mb-4">
      <div class="card-body">
        <h5 class="text-center mb-3">Statistik ToDo</h5>
        <canvas id="todoChart"></canvas>
      </div>
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
              'rgba(108, 117, 125, 0.7)', // abu-abu
              'rgba(25, 135, 84, 0.7)',   // hijau
              'rgba(255, 193, 7, 0.7)'    // kuning
            ],
            borderColor: [
              'rgba(108, 117, 125, 1)',
              'rgba(25, 135, 84, 1)',
              'rgba(255, 193, 7, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'bottom'
            }
          }
        }
      });
    </script>

  </div>
</body>
</html>
