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
        <h3> Laporan nilai Siswa</h3>
        <h4> Nama: {{$siswa->nama_depan}} {{$siswa->nama_belakang}}</h4>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>Mata Pelajaran</th>
                <th>Semester</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($siswa->mapel ?? '' as $mapel)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$mapel->kode}}</td>
                <td>{{$mapel->nama}}</td>
                <td>{{$mapel->semester}}</td>
                <td>{{$mapel->pivot->nilai}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>