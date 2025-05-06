<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rincian ToDo</title>

    <link rel="stylesheet" type="text/css" href="/assets/bootstrap.css">
    <style>
        /* Menambahkan margin atau padding pada body */
        body {
            padding-top: 25px; /* Menambahkan jarak atas */
        }
    </style>
</head>
<body>
    <div class="container-md">
        <center>
            <a href="/todo/admin" class="btn btn-outline-primary rounded text-center" style="width: 180px;">Beranda</a>
        </center>
    <hr>
        <table border="1" class="table table-hover">
            <tr>
                <td colspan="2" align="center">Rincian Data ToDo</td>
            </tr>
            <tr>
                <td><a href="/admin/todo/dataPenugasan" class="text-decoration-none">Ditugaskan</a></td>
                <td>
                    <span class="badge text-bg-secondary">
                        {{ count($ditugaskan) }}
                    </span>
                </td>
            </tr>
            <tr>
                <td><a href="/admin/todo/penugasanSelesai" class="text-decoration-none">Diselesaikan</a></td>
                <td>
                    <span class="badge text-bg-success">
                        {{ count($diselesaikan) }}
                    </span>
                </td>
            </tr>
            <tr>
                <td><a href="/admin/todo/penugasanDitolak" class="text-decoration-none">Ditolak</a></td>
                <td>
                    <span class="badge text-bg-warning">
                        {{ count($ditolak) }}
                    </span>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>