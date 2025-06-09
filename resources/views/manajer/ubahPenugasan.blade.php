<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penugasan Baru</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            /* Variabel Warna Utama */
            --primary-blue: #007bff;
            --dark-blue: #0056b3;
            --light-blue: #e0f2fe;
            --bg-color: #f8f9fa;
            --card-bg: #ffffff;
            --text-dark: #343a40;
            --text-muted: #6c757d;
            --border-light: #dee2e6;
            --shadow-subtle: rgba(0, 0, 0, 0.08);

            /* Status Colors */
            --status-success: #28a745;
            --status-danger: #dc3545;
            --status-info: #17a2b8;
            --status-warning: #ffc107;

            /* Font Variables */
            --font-poppins: 'Poppins', sans-serif;
            --font-montserrat: 'Montserrat', sans-serif;

            /* Variabel tambahan untuk konsistensi */
            --secondary-color: #6c757d;
            --text-color: #343a40;
            --header-bg: #f0f8ff;
            --border-color: #dee2e6;
            --shadow-light: rgba(0, 0, 0, 0.08);
        }

        body {
            font-family: var(--font-poppins);
            background-color: var(--bg-color);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding-top: 0;
            background-image: linear-gradient(rgba(248, 249, 250, 0.95), rgba(248, 249, 250, 0.95)), url('https://images.unsplash.com/photo-1549925206-8c863a3d537f?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding-bottom: 20px;
        }

        /* Kontainer untuk judul utama (lebar penuh) */
        .full-width-header {
            background-color: var(--card-bg);
            color: var(--primary-blue);
            padding: 25px 30px 15px;
            margin: 0;
            border-bottom: 1px solid var(--border-color);
            font-size: 1.8rem;
            font-weight: 600;
            text-align: left;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        /* Kontainer utama untuk konten yang perlu presisi kanan-kiri (form) */
        .main-content-container {
            width: 95%;
            max-width: 1200px; /* Lebar maksimal konsisten */
            background-color: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 8px 25px var(--shadow-light);
            overflow: hidden;
            border: 1px solid var(--border-color);
            margin: 20px auto;
            flex-grow: 1;
            padding: 30px; /* Padding di dalam container utama */
        }
        
        /* Kontainer untuk tombol navigasi dengan outline */
        .nav-buttons-wrapper {
            background-color: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 5px 20px var(--shadow-subtle);
            border: 1px solid var(--border-light);
            padding: 20px 25px;
            margin-bottom: 20px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            width: 95%;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Nav Buttons */
        .nav-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px; /* Jarak antar tombol */
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
            text-decoration: none;
            font-size: 0.95rem;
        }

        .nav-buttons .btn-primary {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
            color: white;
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
            background-color: transparent;
        }
        
        .nav-buttons .btn-outline-primary:hover {
            background-color: var(--primary-blue);
            color: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }

        /* Card untuk form */
        .card {
            border-radius: 12px;
            box-shadow: 0 5px 20px var(--shadow-subtle);
            overflow: hidden;
            border: none;
            margin-bottom: 25px;
        }
        .card-header {
            background-color: var(--light-blue);
            color: var(--dark-blue);
            font-family: var(--font-montserrat);
            font-weight: 600;
            padding: 20px 30px;
            border-bottom: 1px solid var(--border-light);
            font-size: 1.25rem;
            text-align: center;
        }
        .card-body {
            padding: 20px 30px; /* Padding untuk konten di dalam card body */
        }

        /* Form Styling */
        form table {
            width: 100%;
            border-collapse: separate; /* Memungkinkan border-spacing */
            border-spacing: 0 15px; /* Jarak vertikal antar baris */
        }

        form td {
            padding: 8px 0; /* Padding vertikal untuk sel */
            vertical-align: middle;
        }

        form td:first-child {
            width: 150px; /* Lebar label yang konsisten */
            font-weight: 500;
            color: var(--text-dark);
        }

        .form-control,
        select {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid var(--border-light);
            border-radius: 8px;
            font-family: var(--font-poppins);
            font-size: 0.95rem;
            color: var(--text-dark);
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            box-sizing: border-box; /* Penting untuk lebar yang konsisten */
        }

        .form-control:focus,
        select:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            outline: none;
        }

        input[type="date"] {
            /* Override gaya browser default */
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: var(--card-bg); /* Warna latar belakang */
            cursor: text;
        }
        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(30%) sepia(80%) saturate(2000%) hue-rotate(200deg) brightness(80%); /* Warna ikon kalender */
            cursor: pointer;
        }

        .btn-submit {
            background-color: var(--primary-blue);
            border: 1px solid var(--primary-blue);
            color: white;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.2);
            text-decoration: none; /* Untuk konsistensi jika menggunakan a sebagai tombol */
            display: inline-block; /* Untuk padding dan margin */
            text-align: center;
        }

        .btn-submit:hover {
            background-color: var(--dark-blue);
            border-color: var(--dark-blue);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 123, 255, 0.3);
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .full-width-header {
                padding: 20px;
                font-size: 1.6rem;
            }
            .nav-buttons-wrapper {
                padding: 15px 20px;
                gap: 10px;
            }
            .nav-buttons .btn {
                font-size: 0.9rem;
                padding: 8px 15px;
            }
            .main-content-container {
                padding: 20px;
            }
            form td:first-child {
                width: 120px;
            }
            .form-control, select {
                padding: 8px 12px;
                font-size: 0.9rem;
            }
            .btn-submit {
                padding: 10px 20px;
                font-size: 0.95rem;
            }
        }

        @media (max-width: 768px) {
            body {
                padding-bottom: 15px;
            }
            .main-content-container, .nav-buttons-wrapper {
                border-radius: 8px;
                margin: 10px auto;
                width: 98%;
            }
            .full-width-header {
                padding: 15px;
                font-size: 1.4rem;
            }
            .nav-buttons-wrapper {
                padding: 12px 15px;
                gap: 8px;
            }
            .nav-buttons .btn {
                font-size: 0.85rem;
                padding: 6px 12px;
            }
            .main-content-container {
                padding: 15px;
            }
            form table {
                border-spacing: 0 10px;
            }
            form td:first-child {
                width: 100%;
                display: block; /* Label di atas input */
                padding-bottom: 5px;
            }
            form td:last-child {
                display: block;
                padding-top: 0;
            }
            .form-control, select {
                font-size: 0.85rem;
                padding: 7px 10px;
            }
            .btn-submit {
                width: 100%;
                box-sizing: border-box;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            .full-width-header {
                font-size: 1.2rem;
            }
            .nav-buttons .btn {
                flex-grow: 1; /* Biar tombol memenuhi lebar */
            }
        }
    </style>
</head>
<body>

    <div class="nav-buttons-wrapper">
        <div class="nav-buttons">
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

    <div class="main-content-container">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-edit me-2"></i> Ubah Data Tugas
            </div>
            <div class="card-body">
                @foreach ( $detailTodo as $dt )
                <form action="/manajer/todo/simpanPerubahanPenugasan/{{ $dt->id }}/{{ $adminId }}" method="get">
                    @csrf
                    <table>
                        <tr>
                            <td>Nama Tugas</td>
                            <td><input type="text" name="namaTodo" value="{{ $dt->tugas }}" class="form-control"></td>
                        </tr>
                        <?php
                            //format tanggal dalam SQL ke HTML
                            $tanggalMulai = date('Y-m-d', strtotime($dt->waktu_mulai)); 
                            $tanggalSelesai = date('Y-m-d', strtotime($dt->waktu_selesai));
                        ?>
                        <tr>
                            <td>Waktu Mulai</td>
                            <td><input type="date" name="tanggalMulai" value="{{ $tanggalMulai }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Waktu Selesai</td>
                            <td><input type="date" name="tanggalSelesai" value="{{ $tanggalSelesai }}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Delegator</td>
                            <td>
                                <select name="pemberiTugas" class="form-control">
                                    <option selected value="{{ $dt->tugas_dari }}">{{ $dt->nama_pemberi }}</option>
                                    @foreach ( $delegator as $d )
                                    <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Pelaksana</td>
                            <td>
                                <select name="namaPenugas" class="form-control">
                                    <option selected value="{{ $dt->tugas_untuk }}">{{ $dt->nama_penerima}}</option>
                                    @foreach ( $pelaksana as $p )
                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Ubah Penugasan" class="btn-submit"></td>
                        </tr>
                    </table>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>