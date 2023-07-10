<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mapel;

class MapelController extends Controller
{
    public function index()
    {
        $data_mapel = Mapel::all();
        return view('mapel.index', ['data_mapel' => $data_mapel]);
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $check = Mapel::create($data);
        if (!$check) {
            $arr = array('msg' => 'Gagal simpan dengan Ajax', 'status' => false);
        } else {
            $arr = array('msg' => 'Sukses simpan dengan Ajax', 'status' => true);
        }
        return Response()->json($arr);
    }
    public function edit($id)
    {
        $mapel = Mapel::find($id);
        return view('mapel/edit', ['mapel' => $mapel]);
    }
    public function update(Request $request, $id)
    {
        $mapel = Mapel::find($id);
        $mapel->update($request->all());
        return redirect('/mapel')->with('sukses', 'Data berhasil di-update.');
    }
    public function delete($id)
    {
        $mapel = Mapel::find($id);
        $mapel->delete($mapel);
        return redirect('/mapel')->with('sukses', 'Data berhasil di-delete.');
    }
}
