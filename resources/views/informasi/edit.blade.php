@extends('layouts.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Data Informasi</h3>
                    </div>
                    <div class="panel-body">
                        <form action="/informasi/{{$informasi->id}}/update" method="POST" id="informasi_form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="informasi">Informasi</label>
                                <textarea class="form-control" name="informasi" id="informasi" rows="3">{{$informasi->informasi}}</textarea>
                                <span class="text-danger">{{ $errors->first('informasi') }}</span>
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
        })
    }
</script>
@stop