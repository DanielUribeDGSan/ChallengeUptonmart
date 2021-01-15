@extends('layouts.home')

@section('content')
<div class="bg-azul">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 mt-5 mb-5 text-center">
                <div class="espacio-40"></div>
                <h1 class="text-white">La <b class="cl-rosa">página más segura</b> para la administración de
                    tu dinero
                </h1>
                <a class="btn btn-rosa sombra text-white mt-3 pointer" data-toggle="modal"
                    data-target="#modalRegistro">Registrarme</a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 mt-5 mb-5 text-center">
                <img src="{{ asset('img/imagen1.svg') }}" class="img-fluid " alt="caja fuerte" width="50%">
            </div>
        </div>
    </div>
</div>
<section>
    <div class="container">
        <div class="row mt-5" id="info">
            <div class="col-lg-6 col-md-6 col-sm-12 mt-lg-5 mb-lg-5 text-center">
                <h4 class="cl-gris mt-5">En capitec tenemos más de 50,000 usuarios activos que están usando
                    nuestra página para la administración de sus nominas</h4>

                <img src="{{ asset('img/imagen2.svg') }}" class="img-fluid br-20 sombra mt-5" alt="pagos online"
                    width="100%">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 mt-lg-5 mb-lg-5 text-center">
                <img src="{{ asset('img/imagen3.svg') }}" class="img-fluid br-20 sombra mt-5" alt="pagos online"
                    width="100%">
                <p class="cl-gris mt-5">El funcionamiento de capitec es muy sencillo, tan sencillo que con tan
                    solo un clic podrás ver toda la información relacionada a tu nomina y ahorros que puedes realizar
                    con la guía personalizada que se crea con nuestro algoritmo avanzado para predecir tus futuros
                    gastos.</p>
                <button class="btn btn-rosa sombra text-white mt-3" onclick="contacto()">Contactar</button>
            </div>
        </div>
        <div class="espacio-40"></div>
        <div class="row mt-5">
            <div class="col-lg-4 col-md-4 col-sm-12 mb-5 text-center contenedor-img">
                <img src="{{ asset('img/nomina1.png') }}" class="img-fluid br-20 sombra" alt="pagos online"
                    width="100%">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mb-5 text-center contenedor-img">
                <img src="{{ asset('img/nomina2.png') }}" class="img-fluid br-20 sombra" alt="pagos online"
                    width="100%">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mb-5 text-center contenedor-img">
                <img src="{{ asset('img/nomina3.png') }}" class="img-fluid br-20 sombra" alt="pagos online"
                    width="100%">
            </div>
        </div>
    </div>
</section>


@endsection