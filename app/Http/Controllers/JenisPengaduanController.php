<?php

namespace App\Http\Controllers;

use App\Models\JenisPengaduan;
use Illuminate\Http\Request;

class JenisPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|unique:jenis_pengaduans'
        ]);
        $jenis = new JenisPengaduan();
        $jenis->nama_jenis = $request->nama_jenis;
        $jenis->save();
        return redirect()->back()->with(['success' => 'Berhasil Menambahkan Jenis Pengaduan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisPengaduan $jenisPengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisPengaduan $jenisPengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisPengaduan $jenisPengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPengaduan $jenisPengaduan)
    {
        $jenisPengaduan->delete();
        return redirect()->back()->with(['success' => 'Berhasil Menghapus Jenis Pengaduan']);
    }
}
