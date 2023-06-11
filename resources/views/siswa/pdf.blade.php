<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="'admin/assets/vendor/bootstrap/css/bootstrap.min.css'">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h4> Laporan PDF Dengan DOM PDF Laravel</h4>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Email</th>
                <th>No Telp</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($data_siswa ?? '' as $siswa)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$siswa->nama_depan}}</td>
                <td>{{$siswa->nama_belakang}}</td>
                <td>{{$siswa->email}}</td>
                <td>{{$siswa->no_telp}}</td>
                <td>{{$siswa->jenis_kelamin}}</td>
                <td>{{$siswa->agama}}</td>
                <td>{{$siswa->alamat}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>