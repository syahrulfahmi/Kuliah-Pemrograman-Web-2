<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SiswaExport;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\PDF;

class SiswaController extends Controller
{
    public function index()
    {
        $data_siswa = \App\Models\Siswa::all();
        return view('siswa.index', ['data_siswa' => $data_siswa]);
    }
    public function create(Request $request)
    {
        \App\Models\Siswa::create($request->all());
        return redirect('/siswa');
        // $data = $request->all();
        // $check = \App\Models\Siswa::create($data);
        // if(!$check){
        // $arr = array('msg' => 'Gagal simpan dengan Ajax', 'status' => false);
        // }else{
        // $arr = array('msg' => 'Sukses simpan dengan Ajax', 'status' => true);
        // }
        // return Response()->json($arr);
    }

    public function edit($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        return view('siswa/edit', ['siswa' => $siswa]);
    }
    public function update(Request $request, $id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $siswa->update($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('uploads/foto/', $request->file('foto')->getClientOriginalName());
            $siswa->foto = $request->file('foto')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data berhasil di-update.');
    }

    public function delete($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $siswa->delete($siswa);
        return redirect('/siswa')->with('sukses', 'Data berhasil di-delete.');
    }
    public function profile($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        return view('siswa.profile', ['siswa' => $siswa]);
    }

    public function exportExcel()
    {
        $nama_file = 'laporan_data_siswa_' . date('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new SiswaExport, $nama_file);
    }

    public function pdf()
    {
        $data_siswa = Siswa::all();
        return view('siswa.pdf', ['data_siswa' => $data_siswa]);
    }
    public function exportPdf()
    {
        $data_siswa = Siswa::all();
        $pdf = PDF::loadView('siswa.pdf', ['data_siswa' => $data_siswa]);
        return $pdf->download('laporan_data_siswa_' . date('Y-m-d_H-i-s') . '.pdf');
    }

}
