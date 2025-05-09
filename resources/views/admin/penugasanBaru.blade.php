<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penugasan Baru</title>

    <link rel="stylesheet" type="text/css" href="/assets/bootstrap.css">
    <style>
        /* Menambahkan margin atau padding pada body */
        body {
            padding-top: 25px; /* Menambahkan jarak atas */
        }
    </style>
</head>
<body>
    <div class="container-sm">
            <a class="btn btn-outline-primary rounded text-center" style="width: 180px;" href="/todo/admin/{{ $adminId }}">
                Beranda
            </a>
        <hr>
        <form action="/admin/todo/simpanPenugasanBaru" method="get" class="form-inline">
            <table>
                <tr>
                    <td>Nama Tugas</td>
                    <td><input type="text" name="namaTodo" class="form-control" placeholder="Nama Tugas"></td>
                </tr>
                <tr>
                    <td>Waktu Mulai</td>
                    <td><input type="date" name="tanggalMulai" class="form-control"></td>
                </tr>
                <tr>
                    <td>Waktu Selesai</td>
                    <td><input type="date" name="tanggalSelesai" class="form-control"></td>
                </tr>
                <tr>
                    <td>Delegator</td>
                    <td><select name="pemberiTugas"  class="form-control">
                        @foreach ( $namaDelegator as $nd )
                            <option value="{{ $nd->id }}">{{ $nd->nama }}</option>
                        @endforeach
                    </select></td>
                </tr>
                <tr>
                    <td>Pelaksana</td>
                    <td><select name="namaPenugas" class="form-control">
                        @foreach ( $namaPelaksana as $np )
                            <option value="{{ $np->id }}">{{ $np->nama }}</option>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Tugaskan!" class="btn btn-primary"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>