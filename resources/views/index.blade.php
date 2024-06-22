@extends('layout.index')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mt-4">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Selamat Datang di Sistem Pendukung Pemilihan Beasiswa</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <!-- Card: Total Applications -->
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3 shadow p-2">
                <div class="card-header">Total Alternatif</div>
                <div class="card-body">
                    <h3 class="card-title">{{count($alternatif)}}</h3>
                    
                </div>
            </div>
        </div>
        <!-- Card: Approved Applications -->
        <div class="col-md-3">
            <div class="card text-white bg-info mb-3 shadow p-2">
                <div class="card-header">Total Kriteria</div>
                <div class="card-body">
                    <h3 class="card-title">{{count($kriteria)}}</h3>
                   
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3 shadow p-2">
                <div class="card-header">Total Alternatif</div>
                <div class="card-body">
                    <h3 class="card-title">{{count($alternatif)}}</h3>
                    
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info mb-3 shadow p-2">
                <div class="card-header">Total Kriteria</div>
                <div class="card-body">
                    <h3 class="card-title">{{count($kriteria)}}</h3>
                   
                </div>
            </div>
        </div>
        <!-- Card: Pending Applications -->
        
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-secondary text-white">
                    <h3>Statistik Aplikasi</h3>
                </div>
                <div class="card-body">
                    <canvas id="applicationsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('applicationsChart').getContext('2d');
    var applicationsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'],
            datasets: [{
                label: 'Aplikasi',
                data: [10, 20, 30, 40, 50, 60],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
