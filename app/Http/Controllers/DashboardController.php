<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $thisMonth = Survey::whereMonth('tanggal_survey', now()->month)
            ->count();
        $today = Survey::orderBy('created_at', 'desc')
            ->whereDate('tanggal_survey', now()->format('Y-m-d'))
            ->whereIn('status', ['Menunggu DP', 'Sudah DP'])
            ->get();
        $closest = Survey::orderBy('tanggal_survey', 'asc')
            ->whereDate('tanggal_survey', '<', now()->addDays(7)->format('Y-m-d'))
            ->whereDate('tanggal_survey', '>', now()->format('Y-m-d'))
            ->whereIn('status', ['Menunggu DP', 'Sudah DP'])
            ->get();
        return view('dashboard', compact('thisMonth', 'today', 'closest'));
    }
}
