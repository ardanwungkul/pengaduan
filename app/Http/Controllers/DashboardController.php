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
            ->where('respon_1_status', true)
            ->count();

        $pengaduan_ditolak_count = Pengaduan::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->where('respon_1_status', false)
            ->count();

        return view('dashboard', compact(
            'pengaduan_count',
            'pengaduan_diterima_count',
            'pengaduan_ditolak_count',
            'filterMonth'
        ));
    }
}
