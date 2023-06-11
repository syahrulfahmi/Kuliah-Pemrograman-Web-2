<?php

namespace App\Http\Controllers;

use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index()
    {
        $jml_siswa = Siswa::getJumlahSiswaPerTahun();
        return view('dashboards.index', compact('jml_siswa'));
    }
}
