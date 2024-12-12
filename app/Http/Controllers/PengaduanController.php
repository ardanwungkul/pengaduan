<?php

namespace App\Http\Controllers;

use App\Models\KategoriPelapor;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->filter) {
            if ($request->filter == 'diterima') {
                $pengaduan = Pengaduan::where('status', 'Diterima')->get();
            } elseif ($request->filter == 'ditolak') {
                $pengaduan = Pengaduan::where('status', 'Ditolak')->get();
            } else {
                $pengaduan = Pengaduan::all();
            }
        } else {
            $pengaduan = Pengaduan::all();
        }
        return view('master.pengaduan.index', compact('pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori_pelapor = KategoriPelapor::all();
        return view('master.laporan.create', compact('kategori_pelapor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'telepon' => 'required',
            'ktp' => 'required',
            'alamat' => 'required',
            'lokasi_kejadian' => 'required',
            'tanggal_kejadian' => 'required',
            'dokumen' => 'required',
            'kronologi' => 'required',
        ]);

        $pengaduan = new Pengaduan();
        $pengaduan->kategori_id = $request->kategori_id;
        $pengaduan->nama = $request->nama;
        $pengaduan->email = $request->email;
        $pengaduan->telepon = $request->telepon;
        $pengaduan->alamat = $request->alamat;
        $pengaduan->lokasi_kejadian = $request->lokasi_kejadian;
        $pengaduan->tanggal_kejadian = $request->tanggal_kejadian;
        $pengaduan->kronologi = $request->kronologi;
        if ($request->kategori_id == 1) {
            $pengaduan->nomor_pendaftaran = 'MU-' . Str::random(7);
        } else if ($request->kategori_id == 2) {
            $pengaduan->nomor_pendaftaran = 'IP-' . Str::random(7);
        } else {
            $pengaduan->nomor_pendaftaran = 'OPD-' . Str::random(7);
        }
        if ($request->hasFile('ktp')) {
            $image_ktp = $request->file('ktp');
            $image_ktp_name = time() . '_ktp_' . $request->nama . '.' . $image_ktp->getClientOriginalExtension();
            $pengaduan->ktp = $image_ktp_name;
            $image_ktp->move(public_path('/storage/images/' . $pengaduan->nomor_pendaftaran . '/'), $image_ktp_name);
        }
        if ($request->hasFile('dokumen')) {
            $image_dokumen = $request->file('dokumen');
            $image_dokumen_name = time() . '_dokumen_' . $request->nama . '.' . $image_dokumen->getClientOriginalExtension();
            $pengaduan->dokumen = $image_dokumen_name;
            $image_dokumen->move(public_path('/storage/images/' . $pengaduan->nomor_pendaftaran . '/'), $image_dokumen_name);
        }

        $pengaduan->save();
        // return redirect()->back()->with(['success' => 'Berhasil Membuat Laporan']);
    }

    public function changeStatus(Request $request)
    {
        $pengaduan = Pengaduan::find($request->pengaduan_id);
        $pengaduan->status = $request->status;
        $pengaduan->keterangan_ditolak = $request->keterangan;
        $pengaduan->tanggal_status = now();
        $pengaduan->save();
        return redirect()->back()->with(['success' => 'Berhasil Melakukan Proses Data Pengaduan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        //
    }
}
