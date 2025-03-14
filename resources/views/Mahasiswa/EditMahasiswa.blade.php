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
        <h1 class="text-center">Edit Mahasiswa</h1>
        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" value="{{ $mahasiswa->nim }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa"
                    value="{{ $mahasiswa->nama_mahasiswa }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $mahasiswa->email }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan"
                    value="{{ $mahasiswa->jurusan }}" required>
            </div>
            <div class="mb-3">
                <label for="dosen_id" class="form-label">Dosen Pembimbing</label>
                <select class="form-control" id="dosen_id" name="dosen_id" required>
                    @foreach ($dosens as $dosen)
                        <option value="{{ $dosen->id }}" {{ $dosen->id == $mahasiswa->dosen_id ? 'selected' : '' }}>
                            {{ $dosen->nama_dosen }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="/MahasiswaPage" class="btn btn-secondary">Batal</a>
        </form>
    </div>


</body>

</html>
