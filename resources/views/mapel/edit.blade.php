@extends('layouts.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Data Mata Pelajaran</h3>
                    </div>
                    <div class="panel-body">
                        <form action="/mapel/{{$mapel->id}}/update" method="POST" id="mapel_form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="kode">Kode</label>
                                <input type="text" class="form-control" name="kode" id="kode" aria-describedby="kode" placeholder="Kode" value="{{$mapel->kode}}">
                            </div>
                            <span class="text-danger">{{ $errors->first('kode') }}</span>
                            <div class="form-group">
                                <label for="nama_mapel">Nama</label>
                                <input type="text" class="form-control" name="nama_mapel" id="nama_mapel" aria-describedby="nama_mapel" placeholder="Nama Mata Pelajaran" value="{{$mapel->nama}}">
                                <span class="text-danger">{{ $errors->first('nama_mapel') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Semester</label>
                                <select class="form-control" name="semester" id="semester">
                                    <option value="ganjil" @if ($mapel->semester == "ganjil") selected
                                        @endif>Ganjil</option>
                                    <option value="genap" @if ($mapel->semester == "genap")
                                        selected @endif>Genap</option>
                                </select>
                            </div>
                            <a href="javascript:history.go(-1)" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-warning">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

<script>
    $('#msg_div').hide();
    if ($("#mapel_form").length > 0) {
        $("#mapel_form").validate({

                rules: {
                    kode: {
                        required: true,
                        maxlength: 12
                    },
                    nama_mapel: {
                        required: true,
                        maxlength: 50,
                    },
                },
                messages: {
                    kode: {
                        required: "Tolong isi Kode",
                        maxlength: "Kode Mata Pelajaran maksmial 12 karakter."
                    },
                    nama_mapel: {
                        required: "Tolong Isi Nama Mata Pelajaran",
                        maxlength: "Nama Mata Pelajaran maksimal 50 digit",
                    },
                },
            })
        }
</script>

@stop