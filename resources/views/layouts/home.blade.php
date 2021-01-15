<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/png" href="{{ asset('img/icon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Alertas -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <link href="{{ asset('css/app.css?ver=1.0.0') }}" rel="stylesheet">

</head>

<body>

    <header id="header" class="container-fluid bg-azulM">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#"><img src="{{ asset('img/logo.svg') }}" alt="google" width="70px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto pull-lg-right">
                        @guest
                        <li class="nav-item active mr-3">
                            <a class="nav-link pointer" data-toggle="modal" data-target="#modalLogin">INICIAR
                                SESISÓN</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link pointer" data-toggle="modal" data-target="#modalRegistro">REGISTRARME</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="#info">VER MÁS INFORMACIÓN</a>
                        </li>
                        @else
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="registro.html">VER MIS DATOS</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                CERRAR SESIÓN
                            </a>
                        </li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>s
                        @endguest

                    </ul>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')

    <!-- Modales -->


    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-lg-login" role="document">
            <div class="modal-content modal-content-login">
                <div class="modal-header modal-header-login border-none">
                    <h2 class="modal-title text-center font-weight-bold" id="modalLoginLabel">
                        Iniciar sesión</h2>
                    <button type="button" class="close close-login" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-lg-12 centrar text-center">
                                    <p class="text-center op-7">Proporciona tu usuario
                                        y un
                                        correo
                                        electrónico para
                                        recuperar su contraseña.</p>
                                </div>
                            </div>
                            <div class="form-row separacion-100 quitar-separacion-sm mt-lg-5 mb-lg-5">
                                <div class="form-group col-lg-12 col-md-12 text-left">
                                    <label for="email"><span class="form-label-g">Correo electrónico</span>
                                    </label>
                                    <input type="email" class="form-control-login" id="email" name="email" required>

                                </div>
                                <div class="form-group col-lg-12 col-md-12 text-left">
                                    <label for="password"><span class="form-label-g">Contraseña</span>
                                    </label>
                                    <input type="password" class="form-control-login" id="password" name="password"
                                        required>

                                </div>
                                <button type="submit" class="btn btn-rosa btn-block text-white">Iniciar sesión</button>
                            </div>
                        </form>
                    </div>
                    <div class="espacio-50"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="modalRegistroLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-lg-login" role="document">
            <div class="modal-content modal-content-login">
                <div class="modal-header modal-header-login border-none">
                    <h2 class="modal-title text-center font-weight-bold" id="modalRegistroLabel">
                        Todos los datos con <span class="text-danger">*</span> son obligatorios</h2>
                    <button type="button" class="close close-login" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="POST" action="{{ route('register') }}" id="formRegistro">
                            @csrf
                            <div class="form-row">
                                <div class="col-lg-12 centrar text-center">
                                    <p class="text-center op-7">Proporciona tu usuario
                                        y un
                                        correo
                                        electrónico para
                                        recuperar su contraseña.</p>
                                </div>
                            </div>
                            <div class="form-row separacion-100 quitar-separacion-sm mt-lg-5 mb-lg-5">
                                <div class="form-group col-lg-12 col-md-12 text-left">
                                    <label for="nameText"><span class="form-label-g">Nombre</span>
                                    </label>
                                    <input type="text" class="form-control-login" id="nameText" name="nameText">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 text-left">
                                    <label for="emailText"><span class="form-label-g">Correo electrónico</span>
                                    </label>
                                    <input type="email" class="form-control-login" id="emailText" name="emailText">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 text-left">
                                    <label for="passwordText"><span class="form-label-g">Contraseña</span>
                                    </label>
                                    <input type="password" class="form-control-login" id="passwordText"
                                        name="passwordText">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 text-left">
                                    <label for="passwordText2"><span class="form-label-g">Contraseña</span>
                                    </label>
                                    <input type="password" class="form-control-login" id="passwordText2"
                                        name="passwordText2">
                                </div>
                                <a class="btn btn-rosa btn-block text-white"
                                    onclick="registrarUsuario()">Registrarme</a>
                            </div>
                        </form>
                    </div>
                    <div class="espacio-50"></div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-azulM mt-5">
        <div class="container">
            <div class="row centrar-f ">
                <div class="col-lg-4 col-md-4 col-sm-12 mt-lg-5 mb-lg-5 mt-3 mb-3 text-center contenedor-img">
                    <a class="navbar-brand" href="#"><img src="{{ asset('img/logo.svg') }}" alt="google"
                            width="70px"></a><br />
                    <small class="cl-gris">COPYRIGHT ©2021 ALL RIGHTS RESERVED</small>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 mt-lg-5 mb-lg-5 mt-3 mb-3 text-center">
                    <h4> <b class="text-white">Enlaces rapidos</b></h4>
                    <a class="cl-gris pointer td-none mt-3">Iniciar sesión</a><br />
                    <a class="cl-gris pointer td-none mt-3">Iniciar sesión</a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 mt-lg-5 mb-lg-5 mt-3 mb-3 text-center">
                    <button class="btn btn-rosa sombra text-white mt-3" onclick="contacto()">Contactar</button>

                </div>

            </div>
        </div>
    </footer>

    <!-- JS boostrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/app.js?ver=1.0.0') }}"></script>
    <script src="{{ asset('js/validaciones.js?ver=1.0.0') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>



</body>

</html>