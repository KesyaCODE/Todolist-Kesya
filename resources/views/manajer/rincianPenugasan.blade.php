<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rincian ToDo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-blue: #007bff; /* Warna biru utama */
            --dark-blue: #0056b3;    /* Hover primary */
            --light-blue: #e0f2fe;   /* Background card header */
            --bg-color: #f8f9fa;    /* Latar belakang umum yang cerah */
            --card-bg: #ffffff;      /* Latar belakang kartu */
            --text-dark: #343a40;    /* Teks gelap */
            --text-muted: #6c757d;   /* Teks abu-abu */
            --border-light: #dee2e6; /* Border tabel/card */
            --shadow-subtle: rgba(0, 0, 0, 0.08); /* Bayangan halus */

            /* Status Colors */
            --status-success: #28a745; /* Hijau */
            --status-danger: #dc3545; /* Merah */
            --status-info: #17a2b8;   /* Biru Cyan (Ditugaskan) */
            --status-warning: #ffc107; /* Kuning (Ditolak) */

            --font-poppins: 'Poppins', sans-serif;
            --font-montserrat: 'Montserrat', sans-serif;
        }

        body {
            font-family: var(--font-poppins);
            background-color: var(--bg-color);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
            background-image: linear-gradient(rgba(248, 249, 250, 0.95), rgba(248, 249, 250, 0.95)), url('https://images.unsplash.com/photo-1549925206-8c863a3d537f?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
        }

        .container-md {
            max-width: 960px; /* Menyesuaikan lebar container untuk tampilan rincian */
        }

        .header-section {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 25px 35px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px var(--shadow-subtle);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .header-section h1 {
            font-family: var(--font-montserrat);
            font-weight: 700;
            color: var(--primary-blue);
            margin: 0;
            font-size: 2.2rem;
            letter-spacing: -0.5px;
        }

        .nav-buttons .btn {
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .nav-buttons .btn-primary {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
        }

        .nav-buttons .btn-primary:hover {
            background-color: var(--dark-blue);
            border-color: var(--dark-blue);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .nav-buttons .btn-outline-primary {
            color: var(--primary-blue);
            border-color: var(--primary-blue);
        }
        
        .nav-buttons .btn-outline-primary:hover {
            background-color: var(--primary-blue);
            color: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 5px 20px var(--shadow-subtle);
            overflow: hidden;
            border: none;
            margin-bottom: 25px; /* Spasi di bawah card */
        }

        .card-header {
            background-color: var(--light-blue);
            color: var(--dark-blue);
            font-family: var(--font-montserrat);
            font-weight: 600;
            padding: 20px 30px;
            border-bottom: 1px solid var(--border-light);
            font-size: 1.25rem;
            text-align: center; /* Pusatkan teks header */
        }

        .table-details {
            margin-bottom: 0;
        }

        .table-details tr td {
            padding: 15px 25px;
            vertical-align: middle;
            font-size: 1rem;
            border-bottom: 1px solid #f0f0f0;
        }

        .table-details tr:last-child td {
            border-bottom: none;
        }

        .table-details tr td:first-child {
            font-weight: 600;
            color: var(--text-dark);
            width: 30%; /* Beri lebar untuk kolom label */
        }

        .badge {
            padding: 8px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem; /* Ukuran font sedikit lebih besar dari sebelumnya */
            display: inline-flex;
            align-items: center;
            gap: 5px;
            white-space: nowrap;
            text-shadow: 0 1px 1px rgba(0,0,0,0.1);
            min-width: 100px; /* Lebar minimum untuk badge */
            justify-content: center; /* Pusatkan teks di dalam badge */
        }

        /* Custom badge colors */
        .badge.text-bg-success { background-color: var(--status-success) !important; color: white !important; }
        .badge.text-bg-warning { background-color: var(--status-warning) !important; color: var(--text-dark) !important; } /* Sesuaikan warna teks untuk kuning */
        .badge.text-bg-secondary { background-color: var(--status-info) !important; color: white !important; } /* Menggunakan status-info untuk ditugaskan */
        
        .chart-container {
            width: 100%;
            max-width: 600px; /* Ukuran chart maksimal */
            height: 400px;
            margin: 0 auto; /* Pusatkan chart */
            padding: 20px;
            background-color: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 5px 20px var(--shadow-subtle);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .header-section {
                flex-direction: column;
                align-items: flex-start;
                padding: 20px;
            }
            .header-section h1 {
                font-size: 1.8rem;
                margin-bottom: 15px;
            }
            .nav-buttons {
                width: 100%;
                justify-content: flex-start;
            }
            .nav-buttons .btn {
                width: auto;
                flex-grow: 1;
                text-align: center;
            }
            .table-details tr td {
                padding: 12px 15px;
                font-size: 0.9rem;
                display: block; /* Membuat sel tabel stack secara vertikal */
                width: 100%;
                box-sizing: border-box;
            }
            .table-details tr td:first-child {
                width: 100%;
                padding-bottom: 5px;
            }
            .table-details tr td:last-child {
                padding-top: 0;
            }
            .badge {
                width: 100%;
                box-sizing: border-box;
            }
            .chart-container {
                height: 300px; /* Perkecil tinggi chart pada layar kecil */
                padding: 15px;
            }
        }

        @media (max-width: 576px) {
            .container-md {
                padding-left: 15px;
                padding-right: 15px;
            }
            .header-section h1 {
                font-size: 1.6rem;
            }
            .nav-buttons .btn {
                margin-bottom: 8px;
            }
        }
    </style>

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
                <a class="btn btn-outline-primary" href="/manajer/todo/penugasanBaru/{{ $adminId }}">
                    <i class="fas fa-plus-circle"></i> Penugasan Baru
                </a>
                <a class="btn btn-outline-primary" href="/manajer/todo/penugasanSelesai/{{ $adminId }}">
                    <i class="fas fa-check-circle"></i> Tugas Selesai
                </a>
                <a class="btn btn-outline-primary" href="/manajer/todo/penugasanDitolak/{{ $adminId }}">
                    <i class="fas fa-times-circle"></i> Tugas Ditolak
                </a> 
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