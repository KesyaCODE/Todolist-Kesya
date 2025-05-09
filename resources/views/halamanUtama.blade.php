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
            <div class="card-body">
                <center>
                    <h5 class="card-title">Tugas Manajemen ( Todo App )</h5>
                    <p class="card-text">Build with Laravel and MySQL Database</p>
                    <!-- rencana membuka halaman auth untuk selain admin / variasi lain -->
                    <!-- <a href="/todo/user/login">Masuk</a> -->
                    <hr>
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @elseif(session('kosong'))
                        <div class="alert alert-info">
                            {{ session('kosong') }}
                        </div>
                    @endif

                    <form action="/auth/pegawai/prosesLogin" method="get">
                        @csrf
                        <div class="mb-3">
                        <input type="text" name="userName" class="form-control" id="exampleFormControlInput1" placeholder="Email atau nama pengguna">
                        </div>
                        <div class="mb-3">
                        <input type="password" name="kataSandi" class="form-control" id="exampleFormControlInput1" placeholder="Kata Sandi">
                        </div>
                        <div class="mb-3">
                        <input type="submit" class="btn btn-primary" value="Masuk!">
                        </div>
                    </form>
                </center>
            </div>
        </div>
    </div>
</body>
</html>