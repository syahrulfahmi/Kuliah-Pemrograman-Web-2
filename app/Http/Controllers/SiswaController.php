<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SiswaExport;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Mapel;

class SiswaController extends Controller
{
    public function searchSiswaNama(Request $search){
        $query = $search->input('search_nama');

    if ($query) {
        $data_siswa = Siswa::where('nama_depan', 'like', '%' . $query . '%')
            ->orWhere('nama_belakang', 'like', '%' . $query . '%')
            ->get();
    } else {
        $data_siswa = Siswa::all();
    }

    return view('siswa.index', ['data_siswa' => $data_siswa]);
    }
    public function ascendingNama()
    {
        $data_siswa = Siswa::all();
        $data_siswa = Siswa::orderBy('nama_depan', 'asc')->get(); // Mengurutkan siswa berdasarkan nama secara ascending (A-Z)

    return view('siswa.index', ['data_siswa' => $data_siswa]);
    }

    public function descendingNama()
    {
        $data_siswa = Siswa::all();
        $data_siswa = Siswa::orderBy('nama_depan', 'desc')->get(); // Mengurutkan siswa berdasarkan nama secara descending (Z-A)

    return view('siswa.index', ['data_siswa' => $data_siswa]);
    }

    public function index()
    {
        $data_siswa = Siswa::all();
        return view('siswa.index', ['data_siswa' => $data_siswa]);
    }

    public function create(Request $request)
    {
        // \App\Models\Siswa::create($request->all());
        // return redirect('/siswa');
        $data = $request->all();
        $check = \App\Models\Siswa::create($data);
        if (!$check) {
            $arr = array('msg' => 'Gagal simpan dengan Ajax', 'status' => false);
        } else {
            $arr = array('msg' => 'Sukses simpan dengan Ajax', 'status' => true);
        }
        return Response()->json($arr);
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
        $siswa = Siswa::find($id);
        $siswa->delete($siswa);
        return redirect('/siswa')->with('sukses', 'Data berhasil di-delete.');
    }

    public function profile($id)
    {
        $siswa = Siswa::find($id);
        $matapelajaran = Mapel::all();
        //Data Chart Grafik
        $categories = [];
        $data = [];
        foreach ($matapelajaran as $mp) {
            if ($siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()) {
                $categories[] = $mp->nama;
                $data[] = $siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
            }
        }
        return view('siswa.profile', [
            'siswa' => $siswa, 
            'matapelajaran' => $matapelajaran,
            'categories' => $categories, 
            'data' => $data
        ]);
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

    public function addnilai(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        //Validasi jika ada double data mata pelajaran yg diinput
        if ($siswa->mapel()->where('mapel_id', $request->mapel)->exists()) {
            return redirect('siswa/' . $id . '/profile')->with('error', 'Data Mata Pelajaran Sudah Ada');
        }
        $siswa->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);
        return redirect('siswa/' . $id . '/profile')->with('sukses', 'Data Berhasil diupdate');
    }

    public function exportSiswaPdf($id)
    {
        $siswa = Siswa::find($id);
        $mapel = Mapel::all();
        $pdf = PDF::loadView('siswa.siswa-pdf', ['siswa' => $siswa, 'mapel' => $mapel]);
        return $pdf->stream();
    }
}
