<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penugasan Baru</title>

    <!-- menambahkan css bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <center>
        BUAT PENUGASAN BARU <br>
        [ <a href="/admin/todo/dataPenugasan">Beranda Tugas</a> ]
    </center>
    <hr>
    <div class="container-sm">
        <form action="/admin/todo/simpanPenugasanBaru" method="get" class="form-inline">
            <table>
                <tr>
                    <td>Nama Tugas</td>
                    <td><input type="text" name="namaTodo" class="form-control"></td>
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