<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kepegawaian</title>

    <link rel="stylesheet" type="text/css" href="/assets/bootstrap.css">
    <style>
        /* Menambahkan margin atau padding pada body */
        body {
            padding-top: 15px; /* Menambahkan jarak atas */
        }
    </style>
</head>
<body>
    <div class="container-lg">
        <p align="right">
            <a class="btn btn-outline-primary btn-sm rounded text-center" style="width: 140px;"  href="/">Keluar</a>
        </p>
            <a class="btn btn-outline-primary btn-sm rounded text-center" style="width: 140px;" href="/todo/admin/{{ $adminId }}">
                Beranda
            </a>
            
        <hr>
        <table class="table table-striped table-hover table-bordered align-middle shadow-sm rounded w-100 mb-4">
            <thead class="table-success text-center">
                <tr>
                    <th colspan="4"><b>Pengelolaan Pegawai</b></th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <td>
                        <a href="/admin/todo/dataPegawai/{{ $adminId}}" class="text-decoration-none">
                            Data Pegawai
                        </a>
                    </td>
                    <td>
                        <a href="/admin/todo/statistikPegawai" class="text-decoration-none">
                            Statistik Pegawai
                        </a>
                    </td>
                    <td>
                        <a href="/admin/todo/pegawaiBaru" class="text-decoration-none">Pegawai Baru</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>   
</body>
</html>