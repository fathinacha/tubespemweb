<?php

namespace App\Http\Controllers;

use App\Models\RT;
use Illuminate\Http\Request;

class RTController extends Controller
{
    public function index()
    {
        $rts = RT::all();
        return view('rts.index', compact('rts'));
    }

    public function create()
    {
        return view('rts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_rt' => 'required|string|max:50',
            'alamat' => 'required|string|max:200',
            'ketua_rt' => 'required|string|max:100',
        ]);

        RT::create([
            'nama_rt' => $request->nama_rt,
            'alamat' => $request->alamat,
            'ketua_rt' => $request->ketua_rt,
        ]);

        return redirect()->route('rts.index')->with('success', 'RT berhasil dibuat.');
    }


    public function edit(RT $rt)
    {
        return view('rts.edit', compact('rt'));
    }

    public function update(Request $request, RT $rt)
{
    $request->validate([
        'nama_rt' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'ketua_rt' => 'required|string|max:255',
    ]);

    $rt->update($request->all());

    return redirect()->route('rts.index')->with('success', 'Data RT berhasil diperbarui.');
}

    public function destroy(RT $rt)
    {
        $rt->delete();
        return redirect()->route('rts.index');
    }
}
