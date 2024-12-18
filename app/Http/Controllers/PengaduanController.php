<?php

namespace App\Http\Controllers;

use App\Models\JenisPengaduan;
use App\Models\KategoriPelapor;
use App\Models\Pengaduan;
use App\Models\SubjekLaporan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                $pengaduan = Pengaduan::where('respon_1_status', true)
                    ->orderBy('created_at', 'desc')
                    ->get();
            } elseif ($request->filter == 'ditolak') {
                $pengaduan = Pengaduan::where('respon_1_status', false)
                    ->orderBy('created_at', 'desc')
                    ->get();
            } else {
                $pengaduan = Pengaduan::orderBy('created_at', 'desc')->get();
            }
        } else {
            $pengaduan = Pengaduan::orderBy('created_at', 'desc')->get();
        }
        return view('master.pengaduan.index', compact('pengaduan'));
    }
    public function track()
    {
        return view('master.pengaduan.track');
    }
    public function trackSearch(Request $request)
    {
        $pengaduan = Pengaduan::where('nomor_pendaftaran', $request->nomor_pendaftaran)->first();
        if ($pengaduan) {
            return redirect()->route('laporan.track')->with(['pengaduan' => $pengaduan, 'success' => 'Data Laporan Pengaduan Berhasil Ditemukan!']);
        } else {
            return redirect()->route('laporan.track')->withErrors('Laporan Pengaduan Tidak Ditemukan!');
        }
    }
    public function create()
    {
        $subjek_laporan = SubjekLaporan::all();
        $kategori_pelapor = KategoriPelapor::with('instansi')->get();
        return view('master.pengaduan.create', compact('kategori_pelapor', 'subjek_laporan'));
    }
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
        $pengaduan->subjek_id = $request->subjek_id;
        $pengaduan->kategori_instansi_id =  $request->input('kategori_instansi_id_' . $request->kategori_id);
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
        return redirect()->back()->with(['success' => 'Berhasil Membuat Laporan', 'nomor_pendaftaran' => $pengaduan->nomor_pendaftaran]);
    }

    public function changeStatus(Request $request)
    {
        $pengaduan = Pengaduan::find($request->pengaduan_id);
        if ($request->respon == 1) {
            $pengaduan->respon_1_status = $request->status == 'true' ? true : false;
            $pengaduan->respon_1_tanggal = now();
            if ($request->status == 'false') {
                $pengaduan->respon_1_keterangan = $request->keterangan;
            }
            $pengaduan->respon_1_user_id = Auth::user()->id;
        } else if ($request->respon == 2) {
            $pengaduan->respon_2_status = $request->status == 'true' ? true : false;
            $pengaduan->respon_2_tanggal = now();
            if ($request->status == 'false') {
                $pengaduan->respon_2_keterangan = $request->keterangan;
            }
            $pengaduan->respon_2_user_id = Auth::user()->id;
        }
        $pengaduan->save();
        return redirect()->back()->with(['success' => 'Berhasil Melakukan Proses Data Pengaduan']);
    }

    public function downloadRegistrasi($nomor_pendaftaran)
    {
        $pengaduan = Pengaduan::where('nomor_pendaftaran', $nomor_pendaftaran)->first();
        $pdf = PDF::loadView('master.pengaduan.pdf', ['pengaduan' => $pengaduan]);
        return $pdf->download('Nomor Registrasi Pengaduan.pdf');
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
