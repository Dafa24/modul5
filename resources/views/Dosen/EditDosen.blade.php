<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/MahasiswaPage">Mahasiswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Edit Dosen</h1>
        <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="kode_dosen" class="form-label">Kode Dosen</label>
                <input type="text" class="form-control" id="kode_dosen" name="kode_dosen"
                    value="{{ $dosen->kode_dosen }}" required>
            </div>
            <div class="mb-3">
                <label for="nama_dosen" class="form-label">Nama Dosen</label>
                <input type="text" class="form-control" id="nama_dosen" name="nama_dosen"
                    value="{{ $dosen->nama_dosen }}" required>
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" class="form-control" id="nip" name="nip" value="{{ $dosen->nip }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $dosen->email }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="no_telepon" class="form-label">No Telepon</label>
                <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                    value="{{ $dosen->no_telepon }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="/" class="btn btn-secondary">Batal</a>
        </form>
    </div>


</body>

</html>
