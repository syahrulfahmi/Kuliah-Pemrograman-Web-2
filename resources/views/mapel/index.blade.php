@extends('layouts.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="panel">
                    @if(session('sukses'))
                    <div class="alert alert-success" role="alert">
                        {{session('sukses')}}
                    </div>
                    @endif
                    <div class="panel-heading">
                        <h3 class="panel-title">Data Mata Pelajaran</h3>
                        <div class="right">
                            <button type="button" class="btn" data-toggle="modal" data-target="#tambahData">Tambah Data Mata Pelajaran</button>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(session('sukses'))
                        <div class="alert alert-success" role="alert">
                            {{session('sukses')}}
                        </div>
                        @endif
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Semester</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_mapel as $mapel)
                                <tr>
                                    <th>{{$mapel->kode}}</th>
                                    <th>{{$mapel->nama}}</th>
                                    <th>{{$mapel->semester}}</th>
                                    <th>
                                        <a href="/mapel/{{$mapel->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="/mapel/{{$mapel->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin ingin dihapus?')">Delete</a>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahData" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahData">Tambah Data Mata Pelajaran</h5>
                                <button onclick="location.reload();" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="mapel_form" method="POST" action="javascript:void(0)">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="kode">Kode</label>
                                        <input type="text" class="form-control" name="kode" id="kode" aria-describedby="kode" placeholder="Kode">
                                        <span class="text-danger">{{ $errors->first('kode') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" name="nama" id="nama" aria-describedby="nama" placeholder="Nama Mata Pelajaran">
                                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="semester">Semester</label>
                                        <select class="form-control" name="semester" id="semester">
                                            <option value="ganjil">Ganjil</option>
                                            <option value="genap">Genap</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="alert alert-success d-none" id="msg_div">
                                <span id="res_message"></span>
                            </div>
                            <div class="modal-footer">
                                <button onclick="location.reload();" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" id="send_form" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
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
                nama: {
                    required: true,
                    maxlength: 50,
                },
            },
            messages: {
                kode: {
                    required: "Tolong isi Kode",
                    maxlength: "Kode Mata Pelajaran maksmial 12 karakter."
                },
                nama: {
                    required: "Tolong Isi Nama Mata Pelajaran",
                    maxlength: "Nama Mata Pelajaran maksimal 50 digit",
                },
            },
            submitHandler: function(form) {
                $('#send_form').html('Sending..');
                $.ajax({
                    url: "mapel/create",
                    type: "POST",
                    data: $('#mapel_form').serialize(),
                    success: function(response) {
                        $('#send_form').html('Submit');
                        $('#msg_div').show();
                        $('#res_message').show();
                        $('#res_message').html(response.msg);
                        $('#msg_div').removeClass('d-none');
                        document.getElementById("mapel_form").reset();
                        setTimeout(function() {
                            $('#msg_div').hide();
                            $('#res_message').hide();
                            location.reload();
                        }, 5000);
                    }
                });
            }
        })
    }
</script>
@stop