<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::all();
        return view('Dosen/Dosen', compact('dosens')); 
    }

    public function show($id)
    {
        $dosen = Dosen::findOrFail($id); 
        return view('dosens.show', compact('dosen'));
    }

    public function getCreateForm()
    {
        return view('Dosen/TambahDosen');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_dosen' => 'required|string|max:3|unique:dosens',
            'nama_dosen' => 'required|string|max:255',
            'nip' => 'required|string|unique:dosens',
            'email' => 'required|email|unique:dosens',
            'no_telepon' => 'nullable|string',
        ]);

        Dosen::create($validated); 
        return redirect('/')->with('success', 'Dosen berhasil ditambahkan.');
    }

    public function getEditForm($id)
    {
        $dosen = Dosen::findOrFail($id); 
        return view('Dosen/EditDosen', compact('dosen'));
    }

   
    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);

        $validated = $request->validate([
            'kode_dosen' => "required|string|max:3|unique:dosens,kode_dosen,{$id}",
            'nama_dosen' => 'required|string|max:255',
            'nip' => "required|string|unique:dosens,nip,{$id}",
            'email' => "required|email|unique:dosens,email,{$id}",
            'no_telepon' => 'nullable|string',
        ]);

        $dosen->update($validated);
        return redirect('/')->with('success', 'Data dosen berhasil diperbarui.');
    }

   
    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete(); 
        return redirect('/')->with('success', 'Dosen berhasil dihapus.');
    }

}
