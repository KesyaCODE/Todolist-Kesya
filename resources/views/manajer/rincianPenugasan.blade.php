<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rincian ToDo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/manajer/rincianPenugasan.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 

</head>
<body>
    <div class="container-md">
        <div class="header-section">
            <h1><i class="fas fa-chart-pie me-3"></i>Rincian Statistik ToDo</h1>
            <div class="nav-buttons d-flex flex-wrap gap-2">
                <a class="btn btn-outline-primary" href="/todo/manajer/{{ $adminId }}">
                    <i class="fas fa-home"></i> Beranda
                </a>
                {{-- <a class="btn btn-outline-primary" href="/manajer/todo/penugasanBaru/{{ $adminId }}">
                    <i class="fas fa-plus-circle"></i> Penugasan Baru
                </a> --}}
                {{-- <a class="btn btn-outline-primary" href="/manajer/todo/penugasanSelesai/{{ $adminId }}">
                    <i class="fas fa-check-circle"></i> Tugas Selesai
                </a> --}}
                {{-- <a class="btn btn-outline-primary" href="/manajer/todo/penugasanDitolak/{{ $adminId }}">
                    <i class="fas fa-times-circle"></i> Tugas Ditolak
                </a>  --}}
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Statistik Data ToDo
            </div>
            <div class="card-body p-0">
                <table class="table table-details">
                    <tr>
                        <td><i class="fas fa-hourglass-half me-2"></i> Ditugaskan</td>
                        <td>
                            <a href="/admin/todo/dataPenugasan/{{ $adminId }}" class="text-decoration-none">
                                <span class="badge text-bg-secondary">
                                    {{ count($ditugaskan) }}
                                </span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-check-circle me-2"></i> Diselesaikan</td>
                        <td>
                            <a href="/admin/todo/penugasanSelesai/{{ $adminId }}" class="text-decoration-none">
                                <span class="badge text-bg-success">
                                    {{ count($diselesaikan) }}
                                </span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-times-circle me-2"></i> Ditolak</td>
                        <td>
                            <a href="/admin/todo/penugasanDitolak/{{ $adminId }}" class="text-decoration-none">
                                <span class="badge text-bg-warning">
                                    {{ count($ditolak) }}
                                </span>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="chart-container">
            <canvas id="todoChart"></canvas>
        </div>
            
        <script>
            const ctx = document.getElementById('todoChart').getContext('2d');
            const todoChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Ditugaskan', 'Diselesaikan', 'Ditolak'],
                    datasets: [{
                        label: 'Status ToDo',
                        data:  [
                            {{ $jumlahDitugaskan }}, 
                            {{ $jumlahDiselesaikan }}, 
                            {{ $jumlahDitolak }}
                        ],
                        backgroundColor: [
                            'rgba(23, 162, 184, 0.7)', // Menggunakan warna info untuk ditugaskan
                            'rgba(40, 167, 69, 0.7)',  // Hijau untuk diselesaikan
                            'rgba(255, 193, 7, 0.7)'   // Kuning untuk ditolak
                        ],
                        borderColor: [
                            'rgba(23, 162, 184, 1)',
                            'rgba(40, 167, 69, 1)',
                            'rgba(255, 193, 7, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                font: {
                                    family: 'Poppins',
                                    size: 14,
                                    weight: '500'
                                },
                                color: 'var(--text-dark)'
                            }
                        },
                        tooltip: {
                            titleFont: {
                                family: 'Montserrat',
                                weight: '600'
                            },
                            bodyFont: {
                                family: 'Poppins'
                            }
                        }
                    }
                }
            });
        </script>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>