<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My ToDo</title>

    <link rel="stylesheet" type="text/css" href="assets/bootstrap.css">

    <style>
        /* Menambahkan margin atau padding pada body */
        body {
            padding-top: 100px; /* Menambahkan jarak atas */
        }
    </style>

</head>
<body>
    <div class="container-xxl">
        <div class="card">
            <div class="card-header">
                <p align="right">
                    <!-- rencana membuka halaman auth admin -->
                    <a href="/todo/admin">Admin</a>
                </p>
            </div>
            <div class="card-body">
                <center>
                    <h5 class="card-title">Tugas Manajemen ( Todo App )</h5>
                    <p class="card-text">Build with Laravel and MySQL Database</p>
                    <!-- rencana membuka halaman auth untuk selain admin / variasi lain -->
                    <a href="/todo/user/login">Masuk</a>
                </center>
            </div>
        </div>
    </div>
</body>
</html>