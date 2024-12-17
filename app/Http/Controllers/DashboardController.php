<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $filterMonth = $request->query('filter_month', date('Y-m'));
        $startOfMonth = Carbon::createFromFormat('Y-m', $filterMonth)->startOfMonth();
        $endOfMonth = Carbon::createFromFormat('Y-m', $filterMonth)->endOfMonth();
        $pengaduan_count = Pengaduan::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->count();

        $pengaduan_diterima_count = Pengaduan::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->whereIn('status', ['Diterima', 'Ditindak Lanjuti Ke Penelitian'])
            ->count();

        $pengaduan_ditolak_count = Pengaduan::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->where('status', 'Ditolak')
            ->count();

        return view('dashboard', compact(
            'pengaduan_count',
            'pengaduan_diterima_count',
            'pengaduan_ditolak_count',
            'filterMonth'
        ));
    }
}
