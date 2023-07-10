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
                        <h3 class="panel-title">Data Informasi</h3>
                        <div class="right">
                            <button type="button" class="btn" data-toggle="modal" data-target="#tambahData">Tambah Data Informasi</button>
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
                                    <th>Informasi</th>
                                    <th>Created</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_informasi as $informasi)
                                <tr>
                                    <th>{{$informasi->informasi}}</th>
                                    <th>{{$informasi->created_at}}</th>
                                    <th>
                                        <a href="/informasi/{{$informasi->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="/informasi/{{$informasi->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin ingin dihapus?')">Delete</a>
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
                                <h5 class="modal-title" id="tambahData">Tambah Data Informasi</h5>
                                <button onclick="location.reload();" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="informasi_form" method="POST" action="javascript:void(0)">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="informasi">Informasi</label>
                                        <textarea class="form-control" name="informasi" id="informasi" rows="3"></textarea>
                                        <span class="text-danger">{{ $errors->first('informasi') }}</span>
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
    if ($("#informasi_form").length > 0) {
        $("#informasi_form").validate({

            rules: {
                informasi: {
                    required: true,
                    maxlength: 300,
                },
            },
            messages: {
                informasi: {
                    required: "Tolong isi informasi",
                    maxlength: "Informasi maksmial 300 karakter."
                },
            },
            submitHandler: function(form) {
                $('#send_form').html('Sending..');
                $.ajax({
                    url: "informasi/create",
                    type: "POST",
                    data: $('#informasi_form').serialize(),
                    success: function(response) {
                        $('#send_form').html('Submit');
                        $('#msg_div').show();
                        $('#res_message').show();
                        $('#res_message').html(response.msg);
                        $('#msg_div').removeClass('d-none');
                        document.getElementById("informasi_form").reset();
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