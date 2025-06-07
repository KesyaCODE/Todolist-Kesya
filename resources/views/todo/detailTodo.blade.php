<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail To Do</title>

    <link rel="stylesheet" type="text/css" href="/assets/bootstrap.css">
    <style>
        /* Menambahkan margin atau padding pada body */
        body {
            padding-top: 15px; /* Menambahkan jarak atas */
        }
    </style>
</head>
<body>
    <div class="container-sm">
        <center>
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
    </center>
    <hr>
        <table align="center" border="0">
            @foreach ( $detailTodo as $detail )
                <form action="/todo/perbaruiTodo/{{ $detail->id }}" method="get">
                    <tr>
                        <td>Nama Tugas</td>
                        <td>{{ $detail->tugas }}</td>
                    </tr>
                    <tr>
                        <td>Waktu Mulai</td>
                        <td>{{ $detail->waktu_mulai }}</td>
                    </tr>
                    <tr>
                        <td>Waktu Selesai</td>
                        <td>{{ $detail->waktu_selesai }}</td>
                    </tr>
                    <tr>
                        <td>Penugasan Oleh</td>
                        <td>{{ $detail->pemberi_tugas }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="statusPekerjaan">
                                <option value="{{ $detail->keterangan }}">{{ $detail->keterangan }}</option>
                                <option value="Dikerjakan">Dikerjakan</option>
                                <option value="Ditolak">Ditolak</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Perbarui"></td>
                    </tr>
                </form>
            @endforeach
        </table>
    </div>
</body>
</html>