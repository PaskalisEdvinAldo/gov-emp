@extends('layouts.main')

@section('title', 'Gov-Emp | Dashboard')

@section('container')
<div class="col-md-12 fw-bold fs-3 mb-3">Dashboard</div>
<div class="row">

    {{-- Total Employees --}}
    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Employees</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $allEchelon }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-people-fill fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Total Echelon I --}}
    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Echelon I</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalEchelonI }}</div>
                        </div>
                        <div class="col-auto">
                        <i class="bi bi-person-standing fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Total Echelon II --}}
    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Echelon II</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalEchelonII }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-person-standing fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Total Echelon III --}}
    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Echelon III</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalEchelonIII }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-person-standing fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Total Echelon IV --}}
    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Echelon IV</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalEchelonIV }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-person-standing fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Total Echelon V --}}
    <div class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Echelon V</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalEchelonV }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-person-standing fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Total All Employees --}}
<div class="row">
    <div class="col-lg-12 mb-4">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Total Employees by Groups</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="employeeChart"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('employeeChart').getContext('2d');
    var employeeChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($chart->labels) !!},
            datasets: [
                {
                    label: "Total Employees per Group",
                    data: {!! json_encode($chart->datasets[0]->values) !!},
                    borderColor: "rgba(54, 162, 235, 1)",
                    backgroundColor: "rgba(54, 162, 235, 0.2)",
                    borderWidth: 2,
                    fill: true
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
@endsection
