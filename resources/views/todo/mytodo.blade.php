<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My To Do</title>

    <!-- menambahkan bootstrap -->
    <link rel="stylesheet" type="text/css" href="/assets/bootstrap.css">

    <style>
        /* Menambahkan margin atau padding pada body */
        body {
            padding-top: 30px; /* Menambahkan jarak atas */
        }
    </style>
</head>
<body>
    <div class="container-sm">
        <nav style="--bs-breadcrumb-divider: ''; padding-left: 20px;" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a class="d-inline-block text-decoration-none border border-primary rounded px-2 py-1 fs-7 text-center" style="min-width: 110px;" href="/todo/user/login/{{ $idPengguna }}">
                        Beranda
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a class="d-inline-block text-decoration-none border border-primary rounded px-2 py-1 fs-7 text-center" style="min-width: 110px;" href="/todo/mytodo/selesai/{{ $idPengguna }}">
                        Tugas Selesai
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a class="d-inline-block text-decoration-none border border-primary rounded px-2 py-1 fs-7 text-center" style="min-width: 110px;" href="/todo/mytodo/ditolak/{{ $idPengguna }}">
                        Tugas Ditolak
                    </a>
                </li>
            </ol>
    </nav>
    <hr>
    <center>
        <b>
            Daftar Tugas Saya
        </b>
    </center>
    
    <!-- bila data tidak ada, tampilkan pesan tidak ada data -->
    @if (count($daftarTugas)>0) 
    <table border="0">
            @foreach ( $daftarTugas as $tugas )
            <tr>
                <td>{{ $loop->iteration }}.</td>
                <td>
                    <a href="/todo/detailTugas/{{ $tugas->id }}/{{ $idPengguna }}" class="link-offset-2 link-underline link-underline-opacity-0">
                        {{ $tugas->tugas }}
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
        @else
        <center>Tidak ada tugas baru!</center>
    @endif
    </div>
</body>
</html>