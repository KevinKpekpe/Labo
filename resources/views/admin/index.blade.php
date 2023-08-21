@extends('admin.base')
@section('content')
<section class="content home">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Dashboard</h2>
            <small class="text-muted">Bienvenue sur notre application</small>
        </div>

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-blue"></i> </div>
                    <div class="content">
                        <div class="text">Nombre de Patients</div>
                        <div class="number">{{$patientsCount}}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-account col-green"></i> </div>
                    <div class="content">
                        <div class="text">Examen Disponible</div>
                        <div class="number">{{$examCount}}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-bug col-blush"></i> </div>
                    <div class="content">
                        <div class="text">opérations du jour</div>
                        <div class="number">{{$bonDetailsCount}}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="info-box-4 hover-zoom-effect">
                    <div class="icon"> <i class="zmdi zmdi-balance col-cyan"></i> </div>
                    <div class="content">
                        <div class="text">Bénefice du Laboratoire</div>
                        <div class="number">{{$amount}}Fc</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Evolution graphoque de l'hopital</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                                <ul class="dropdown-menu float-right">
                                    <li><a href="javascript:void(0);">Période en cours</a></li>
                                    <li><a href="javascript:void(0);">Il y'a 2an</a></li>
                                    <li><a href="javascript:void(0);">Période précedante</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <canvas id="line_chart" height="70"></canvas>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
@section('extra-js')
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var chartLabels = {!! json_encode($chartLabels) !!};
        var datasets = {!! json_encode($datasets) !!};

        var ctx = document.getElementById("line_chart").getContext("2d");
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartLabels,
                datasets: datasets
            },
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Number of Occurrences'
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
@endsection

