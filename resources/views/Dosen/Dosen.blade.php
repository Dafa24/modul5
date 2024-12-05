<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dosen Page</title>
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
        <h1 class="text-center mt-5">Page Dosen</h1>
        <div>
            <a href="/TambahDosen">
                <button type="button" class="btn btn-primary">Tambah Dosen</button>
            </a>
        </div>
    </div>

    <div class="p-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Dosen</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Email</th>
                    <th scope="col">No Telepon</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dosens as $dosen)
                    <tr scope="row">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dosen->kode_dosen }}</td>
                        <td>{{ $dosen->nama_dosen }}</td>
                        <td>{{ $dosen->nip }}</td>
                        <td>{{ $dosen->email }}</td>
                        <td>{{ $dosen->no_telepon }}</td>
                        <td class="d-flex gap-2">
                            <div>
                                <a href="{{ route('dosen.edit', $dosen->id) }}">
                                    <button type="button" class="btn btn-primary">Edit</button>
                                </a>
                            </div>
                            <div>
                                <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus dosen {{ $dosen->nama_dosen }} ?')">Hapus</button>
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
