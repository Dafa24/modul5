<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('dosen')->get();
        return view('Mahasiswa/Mahasiswa', compact('mahasiswas')); 
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::with('dosen')->findOrFail($id);
        $dosens = Dosen::all();
        return view('Mahasiswa/EditMahasiswa', compact('mahasiswa', 'dosens'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nim' => 'required|string|unique:mahasiswas,nim,' . $id, 
            'nama_mahasiswa' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswas,email,' . $id, 
            'jurusan' => 'required|string|max:255',
            'dosen_id' => 'required|exists:dosens,id',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($validated);

        return redirect('/MahasiswaPage')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect('/MahasiswaPage')->with('success', 'Mahasiswa berhasil dihapus.');
    }

    public function getCreateForm()
    {
        $dosens = Dosen::all();
        return view('Mahasiswa/TambahMahasiswa', compact('dosens'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|string|unique:mahasiswas',
            'nama_mahasiswa' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswas',
            'jurusan' => 'required|string|max:255',
            'dosen_id' => 'required|exists:dosens,id',
        ]);

        Mahasiswa::create($validated);
        return redirect('/MahasiswaPage')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }
}
