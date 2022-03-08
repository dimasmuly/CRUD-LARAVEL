<?php

namespace App\Http\Controllers;


use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CreateController extends Controller
{
    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $validate= $request->validate([
            'nim' => 'required|string|max:155',
            'email' => 'required',
            'jurusan' => 'required'
        ]);

        $mahasiswa = Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => Str::slug($request->jurusan)
        ]);

        if ($mahasiswa) {
            return redirect()
                ->route('mahasiswa.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }
    public function update (Request $request, $id)
    {
        $validate= $request->validate([
            'nim' => 'required|string|max:155',
            'email' => 'required',
            'jurusan' => 'required'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => Str::slug($request->jurusan)
        ]);

        if ($mahasiswa) {
            return redirect()
                ->route('mahasiswa.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }
    public function delete($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()
            ->route('mahasiswa.index')
            ->with([
                'success' => 'New post has been created successfully'
            ]);
    }
}
