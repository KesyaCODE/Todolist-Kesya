<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>

    <link rel="stylesheet" type="text/css" href="/assets/bootstrap.css">
</head>
<body>
    <div class="container">
        <!-- rencana buat dalam bentuk session atau log out betulan -->
        <p align="right"><a href="/">Keluar</a></p>
        Selamat Datang!
        <hr>
        <table align="center" border="1" class="table table-striped">
            <tr>
                <td colspan="3" align="center">MyTodo Today</td>
            </tr>
            <tr>
                <td>
                    <div class="card w-50">
                        <div class="card-body">
                            <h5 class="card-title">Tugas Saya</h5>
                            <p class="card-text">Cek penugasan yang diberikan oleh pejabat terkait untukmu</p>

                            <!-- melihat tugas yang diberikan atasan -->
                            <a href="/todo/mytodo" class="card-link">Lihat Tugas!</a>
                        </div>
                    </div>
                </td>
                <td align="center">

                <!-- melihat tugas yang sudah di selesaikan -->
                    <a href="/todo/mytodo/selesai">Tugas Selesai</a></td>
                <td align="left"><a href="/todo/mytodo/ditolak">Tugas Ditolak</a></td>
            </tr>
        </table>
    </div>
</body>
</html>