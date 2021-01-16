@extends('layouts.home')

@section('content')
<div class="container mt-5">

    @if ($nominas == [])
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bienvenido: {{ Auth::user()->name }}</h1>

        <a class="d-none d-sm-inline-block btn btn-sm btn-rosa text-white pointer" onclick="infoNomina()"><i
                class="fas fa-money-check-alt mr-2"></i>
            Ver información sobre mi nómina</a>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <img src="{{ asset('img/datos_vacios.svg') }}" class="img-fluid br-20 sombra mt-3" alt="datos vacíos"
                width="60%">
            <h2 class="mt-3">Aún no hay datos de tu nómina</h2>
        </div>
    </div>
    @else

    <!-- Page Heading -->
    <div class="espacio-100"></div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 animate__animated animate__fadeInDown">Bienvenido: {{ Auth::user()->name }}
        </h1>
        <a href="{{url('/exportar-pdf')}}" target="_blank"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm animate__animated animate__fadeInRight"><i
                class="fas fa-download fa-sm text-white-50"></i> Generar reporte</a>
    </div>
    <!-- Content Row -->
    <p class="animate__animated animate__fadeInLeft">La resta de tu sueldo bruto es del 10 %</p>
    <div class="row animate__animated animate__animated animate__fadeInLeft">
        @foreach ($nominas as $key => $nomina)
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Banco</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$nomina->banco}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">N° cuenta
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$nomina->cuenta}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-id-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Sueldo bruto
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                ${{number_format($nomina->cantidad_bruto, 2)}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sueldo neto
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                ${{$nomina->cantidad_neta}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Dirección
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{$nomina->direccion}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-id-card-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Teléfono
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{"(".substr($nomina->telefono,0,3).")"." ".substr($nomina->telefono,5,3)."-".substr($nomina->telefono,6,4)}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-id-card-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-12 mb-4">
            <hr>
        </div>
        @endforeach
    </div>
    <div class="espacio-100"></div>
    @endif
</div>
<!-- /.container-fluid -->
@endsection