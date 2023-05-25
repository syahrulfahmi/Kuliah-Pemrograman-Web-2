@extends('layouts.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Data Siswa</h3>
                    </div>
                    <div class="panel-body">
                        @if(session('sukses'))
                        <div class="alert alert-success" role="alert">
                            {{session('sukses')}}
                        </div>
                        @endif
                        <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                            <div class="form-group">
                                <label for="nama_depan">Nama Depan</label>
                                <input type="text" class="form-control" name="nama_depan" 
                                id="nama_depan" aria-describedby="nama_depan" placeholder="Nama Depan" 
                                value="{{$siswa->nama_depan}}">
                            </div>
                            <div class="form-group">
                                <label for="nama_belakang">Nama Belakang</label>
                                <input type="text" class="form-control" name="nama_belakang" 
                                id="nama_belakang" aria-describedby="nama_belakang" placeholder="Nama Belakang" 
                                value="{{$siswa->nama_belakang}}">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Pilih Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" 
                                id="jenis_kelamin">
                                <option value="L" @if ($siswa->jenis_kelamin == "L") selected 
                                    @endif>Laki-laki</option>
                                    <option value="P" @if ($siswa->jenis_kelamin == "P") selected 
                                        @endif>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <input type="text" class="form-control" name="agama" id="agama" 
                                    aria-describedby="nama_depan" placeholder="Agama" value="{{$siswa->agama}}">
                                </div> 
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" 
                                    rows="3">{{$siswa->alamat}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Foto</label>
                                    <input type="file" class="form-control" name="foto" id="foto">
                                </div>
                                <a href="/siswa" class="btn btn-secondary">Back</a>
                                <button type="submit" class="btn btn-warning">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop