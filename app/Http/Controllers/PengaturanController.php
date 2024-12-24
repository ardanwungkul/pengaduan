<?php

namespace App\Http\Controllers;

use App\Models\KategoriInstansi;
use App\Models\KategoriPelapor;
use App\Models\SubjekLaporan;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->tab || ($request->tab !== 'subjek_laporan' && $request->tab !== 'kategori_instansi')) {
            return redirect()->route('pengaturan.index', ['tab' => 'subjek_laporan']);
        }
        if ($request->tab == 'subjek_laporan') {
            $subjek = SubjekLaporan::all();
            return view('master.pengaturan.index', compact('subjek'));
        }
        if ($request->tab == 'kategori_instansi') {
            $kategori = KategoriPelapor::all();
            $instansi = KategoriInstansi::all();
            return view('master.pengaturan.index', compact('instansi', 'kategori'));
        }
    }
}
