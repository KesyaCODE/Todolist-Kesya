<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>My ToDo - Login</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 1rem;
    }

    .login-container {
      background: white;
      border-radius: 24px;
      box-shadow: 0 16px 40px rgba(0,0,0,0.15);
      overflow: hidden;
      max-width: 900px;
      width: 100%;
      display: grid;
      grid-template-columns: 1fr 1fr;
      min-height: 500px;
    }

    .login-image {
      background: url('https://images.unsplash.com/photo-1521790363037-cd5d32f7f2b1?auto=format&fit=crop&w=800&q=80') no-repeat center center;
      background-size: cover;
      filter: brightness(0.85);
    }

    .login-form {
      padding: 3rem 2.5rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .login-form h2 {
      font-weight: 700;
      margin-bottom: 0.25rem;
      color: #333;
    }

    .login-form p {
      color: #666;
      margin-bottom: 2rem;
      font-size: 1.1rem;
    }

    .form-control {
      padding-left: 2.75rem;
      border-radius: 12px;
      box-shadow: none;
      border: 1.8px solid #ddd;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus {
      border-color: #764ba2;
      box-shadow: 0 0 8px rgba(118, 75, 162, 0.4);
      outline: none;
    }

    .input-icon {
      position: absolute;
      left: 1rem;
      top: 50%;
      transform: translateY(-50%);
      color: #764ba2;
      font-size: 1.2rem;
    }

    .input-group {
      position: relative;
      margin-bottom: 1.75rem;
    }

    .btn-login {
      background: linear-gradient(45deg, #764ba2, #667eea);
      border: none;
      padding: 0.75rem;
      font-weight: 700;
      border-radius: 12px;
      color: white;
      font-size: 1.15rem;
      transition: background 0.4s ease;
      width: 100%;
      cursor: pointer;
    }

    .btn-login:hover {
      background: linear-gradient(45deg, #5a3580, #4a5dc7);
    }

    .alert {
      border-radius: 12px;
      font-weight: 600;
    }

    @media (max-width: 768px) {
      .login-container {
        grid-template-columns: 1fr;
        min-height: auto;
        border-radius: 20px;
      }

      .login-image {
        height: 200px;
        filter: brightness(0.75);
      }
    }
  </style>
</head>
<body>

  <div class="login-container">
    <div class="login-image d-none d-md-block"></div>

    <div class="login-form">
      <h2>Tugas-Tugas Lembaga</h2>
      <p>Riwayat dan Status Penugasan</p>

      <hr>

      @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @elseif(session('kosong'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
          {{ session('kosong') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <form action="/auth/pegawai/prosesLogin" method="post" class="mt-3">
        @csrf

        <div class="input-group">
          <i class="bi bi-person input-icon"></i>
          <input type="text" name="userName" class="form-control" placeholder="Email atau nama pengguna" required autofocus />
        </div>

        <div class="input-group">
          <i class="bi bi-lock input-icon"></i>
          <input type="password" name="kataSandi" class="form-control" placeholder="Kata Sandi" required />
        </div>

        <button type="submit" class="btn-login">Masuk!</button>
      </form>
    </div>
  </div>

  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
