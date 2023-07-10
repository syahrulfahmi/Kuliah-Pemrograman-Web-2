<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Informasi;

class DashboardController extends Controller
{
    public function index()
    {
        $jml_siswa = Siswa::getJumlahSiswaPerTahun();
        $data_siswa = Siswa::all();
        $data_informasi = Informasi::latest()->first();
        return view('dashboards.index', compact('jml_siswa'), ['data_siswa' => $data_siswa, 'data_informasi' => $data_informasi]);

    }
}
