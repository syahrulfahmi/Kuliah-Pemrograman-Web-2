@extends('layouts.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Information Period: {{date('d-m-Y') }}</h3>
                        <div class="right">
                            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                            <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                        </div>
                    </div>
                    <div class="panel-body">
                        <p>Informasi Sekolah.</p>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Report
                            Overview</h3>
                        <p class="panel-subtitle">Period: {{ date('d-m-Y') }}</p>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="metric">
                                    <span class="icon"><i class="lnr lnr-user"></i></span>
                                    <p>
                                        <span class="number">1,252</span>
                                        <span class="title">Total Siswa</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <a href="/siswa">
                                    <div class="metric">
                                        <span class="icon"><i class="lnr lnr-user"></i></span>
                                        <p>
                                            <span class="number">Menu</span>
                                            <span class="title">Siswa</span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="/mat-pel">
                                    <div class="metric">
                                        <span class="icon"><i class="lnr lnr-book"></i></span>
                                        <p>
                                            <span class="number">Menu</span>
                                            <span class="title">Mata Pelajaran</span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Grafik Siswa</h3>
                            </div>
                            <div class="panel-body">
                                <div id="bar-chart" class="ct-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(function() {
    var options;
    var data = {
    labels: {!! json_encode($jml_siswa['category']) !!},
    series: [
    {!! json_encode($jml_siswa['series']) !!},
    ]
};
// line chart
options = {
height: "300px",
showPoint: true,
axisX: {
showGrid: true,
},
lineSmooth: true,
};
new Chartist.Bar('#bar-chart', data, options);
});
</script>
@stop