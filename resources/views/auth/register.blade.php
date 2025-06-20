<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white text-center">
                    <h4>Registrasi Akun</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('register.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nama lengkap" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email aktif" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Minimal 6 karakter" required>
                        </div>

                        <div class="form-input">
                                <label for="role">Daftar Sebagai:</label>
                                <select name="role" id="role" class="form-select" required>
                                    <option value="staf">Staf</option>
                                    <option value="supervisor">Supervisor</option>
                                </select>
                            </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Daftar</button>
                        </div>

                        <div class="mt-3 text-center">
                            <a href="{{ route('login') }}">Sudah punya akun? Login</a><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
