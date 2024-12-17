<?php

namespace App\Http\Controllers;

use App\Models\KategoriInstansi;
use Illuminate\Http\Request;

class KategoriInstansiController extends Controller
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
            'kategori_id' => 'required',
            'nama' => 'required|unique:kategori_instansis'
        ]);
        $instansi = new KategoriInstansi();
        $instansi->kategori_id = $request->kategori_id;
        $instansi->nama = $request->nama;
        $instansi->save();
        return redirect()->back()->with(['success' => 'Berhasil Menambahkan Kategori Instansi']);
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriInstansi $kategoriInstansi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriInstansi $kategoriInstansi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriInstansi $kategoriInstansi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriInstansi $kategori_instansi)
    {
        $kategori_instansi->delete();
        return redirect()->back()->with(['success' => 'Berhasil Menghapus Kategori Instansi']);
    }
}
