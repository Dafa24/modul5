<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mahasiswa Page</title>
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
    <div class="d-flex flex-column align-items-center">
    <h1 class="text-center mt-5">Dashboard EAD University</h1>
        <h1 class="text-center mt-5">Page Mahasiswa</h1>
        <div>
            <a href="/Mahasiswa/add">
                <button type="button" class="btn btn-primary">Tambah Mahasiswa</button>
            </a>
        </div>
    </div>
    <div class="p-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Dosen Pembimbing</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                    <tr scope="row">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                        <td>{{ $mahasiswa->email }}</td>
                        <td>{{ $mahasiswa->jurusan }}</td>
                        <td>{{ $mahasiswa->dosen->nama_dosen ?? 'Belum Ada' }}</td>
                        <td class="d-flex gap-2">
                            <div>
                                <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}">
                                    <button type="button" class="btn btn-primary">Edit</button>
                                </a>
                            </div>
                            <div>
                                <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus mahasiswa {{ $mahasiswa->nama_mahasiswa }}?')">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>
