<?php

namespace App\Http\Controllers;

use App\Models\SubjekLaporan;
use Illuminate\Http\Request;

class SubjekLaporanController extends Controller
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
            'nama_subjek' => 'required|unique:subjek_laporans'
        ]);
        $jenis = new SubjekLaporan();
        $jenis->nama_subjek = $request->nama_subjek;
        $jenis->save();
        return redirect()->back()->with(['success' => 'Berhasil Menambahkan Subjek Laporan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(SubjekLaporan $subjekLaporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubjekLaporan $subjekLaporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubjekLaporan $subjekLaporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubjekLaporan $subjekLaporan)
    {
        $subjekLaporan->delete();
        return redirect()->back()->with(['success' => 'Berhasil Menghapus Subjek Laporan']);
    }
}
