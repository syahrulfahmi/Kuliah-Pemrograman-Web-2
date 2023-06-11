<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nama_depan', 'nama_belakang', 'jenis_kelamin', 'agama', 'alamat', 'foto', 'email' , 'no_telp','angkatan'];
    
    public function getFoto()
    {
    if(!$this->foto)
    {
    return asset('uploads/foto/default.png');
    }
    return asset('uploads/foto/'.$this->foto);
    }

    public static function getJumlahSiswaPerTahun(){
        $tahun_awal = date('Y') - 5;
        $tahun_akhir = date('Y');
        $category = [];
        $series = []; 
        $j = 0;
        for ($i=$tahun_awal; $i <= $tahun_akhir ; $i++) { 
        $category[] = $i;
        $series[] = Self::where('angkatan','=', $i)->count();
        }
        return ['category' => $category, 'series' => $series];
        }
       
}
