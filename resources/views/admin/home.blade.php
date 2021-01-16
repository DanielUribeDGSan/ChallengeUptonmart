@extends('layouts.home')

@section('content')


<!-- Begin Page Content -->
<div class="container-fluid mt-5 p-5">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 animate__animated animate__fadeInDown animate__delay-1s">Nóminas</h1>
    <a class="btn btn-success btn-sm text-white mb-3 animate__animated animate__fadeInLeft animate__delay-1s"
        data-toggle="modal" data-target="#modalRegistroNomina">Agregar una
        nueva
        nómina</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4 animate__animated animate__fadeInUp animate__delay-1s">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatable-nominas" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Dirección</th>
                            <th>Cuenta</th>
                            <th>Banco</th>
                            <th>Cantidad bruto</th>
                            <th>Teléfono</th>
                            <th>Id usuario</th>
                            <th>Actualizar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nominas as $key => $nomina)
                        <tr>
                            <td>{{$nomina->direccion}}</td>
                            <td>{{$nomina->cuenta}}</td>
                            <td>{{$nomina->banco}}</td>
                            <td>{{number_format($nomina->cantidad_bruto, 2)}}</td>
                            <td>{{$nomina->telefono}}</td>
                            <td>{{$nomina->user_id}}</td>
                            <td><button class="btn btn-primary" data-toggle="modal" data-target="#modalActualizarNomina"
                                    onclick="mostrarDatosNominas('{{$nomina->direccion}}','{{$nomina->cuenta}}','{{$nomina->banco}}','{{$nomina->cantidad_bruto}}','{{$nomina->telefono}}', '{{$nomina->id}}')">Actualizar</button>
                            </td>
                            <td><button class="btn btn-danger"
                                    onclick="eliminarNomina('{{$nomina->id}}')">Eliminar</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="espacio-40"></div>
    <hr>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 mt-5 animate__animated animate__fadeInDown animate__delay-1s">Usuarios</h1>
    <a class="btn btn-success btn-sm text-white mb-3 animate__animated animate__fadeInLeft animate__delay-1s"
        data-toggle="modal" data-target="#modalRegistroUsuarios">Agregar
        usuarios</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4 animate__animated animate__fadeInDown animate__delay-1s">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatable-usuarios" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Tipo usuario</th>
                            <th>Actualizar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $key => $usuario)
                        <tr>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->tipo_usuario}}</td>
                            <td><button class="btn btn-primary" data-toggle="modal"
                                    data-target="#modalActualizarUsuarios"
                                    onclick="mostrarDatosUsuarios('{{$usuario->name}}','{{$usuario->email}}','{{$usuario->tipo_usuario}}','{{$usuario->id}}' )">Actualizar</button>
                            </td>
                            <td><button class="btn btn-danger"
                                    onclick="eliminarUsuario('{{$usuario->id}}')">Eliminar</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Modales -->
<div class="modal fade" id="modalRegistroUsuarios" tabindex="-1" role="dialog"
    aria-labelledby="modalRegistroUsuariosLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-lg-login" role="document">
        <div class="modal-content modal-content-login">
            <div class="modal-header modal-header-login border-none">
                <h2 class="modal-title text-center font-weight-bold ml-3" id="modalRegistroUsuariosLabel">
                    Registrar usuarios</h2>
                <button type="button" class="close close-login" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="POST" action="{{ route('registro-usuario') }}" id="formRegistroUsurios">
                        @csrf
                        <div class="form-row">
                            <div class="col-lg-12 centrar text-center">
                                <p class="text-center ">Llena los siguientes datos</p>
                            </div>
                        </div>
                        <div class="form-row separacion-100 quitar-separacion-sm mt-lg-5 mb-lg-5">
                            <div class="form-group col-lg-12 col-md-12 text-left">
                                <label for="nombreUsu"><span class="form-label-g">Nombre <span
                                            class="text-danger">*</span></span>
                                </label>
                                <input type="text" class="form-control-login" id="nombreUsu" name="nombreUsu">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 text-left">
                                <label for="emailUsu"><span class="form-label-g">Email <span
                                            class="text-danger">*</span></span>
                                </label>
                                <input type="text" class="form-control-login" id="emailUsu" name="emailUsu">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 text-left">
                                <label for="passUsu"><span class="form-label-g">Contraseña <span
                                            class="text-danger">*</span></span>
                                </label>
                                <input type="text" class="form-control-login" id="passUsu" name="passUsu">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 text-left">
                                <label for="tipoUsu"><span class="form-label-g">Tipo de usuario<span
                                            class="text-danger">*</span></span>
                                </label>
                                <select type="text" class="form-control-login" id="tipoUsu" name="tipoUsu">
                                    <option class="selected disabled" value="0">Selecciona una opción</option>
                                    <option class="" value="admin">Administrador</option>
                                    <option class="" value="user">Usuario</option>
                                </select>
                            </div>

                            <a class="btn btn-success btn-block text-white" onclick="registrarAdminUsuarios()">Registrar
                                usuario</a>
                        </div>
                    </form>
                </div>
                <div class="espacio-50"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalActualizarUsuarios" tabindex="-1" role="dialog"
    aria-labelledby="modalActualizarUsuariosLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-lg-login" role="document">
        <div class="modal-content modal-content-login">
            <div class="modal-header modal-header-login border-none">
                <h2 class="modal-title text-center font-weight-bold ml-3" id="modalActualizarUsuariosLabel">
                    Actualizar usuarios</h2>
                <button type="button" class="close close-login" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="POST" action="{{ route('actualizar-usuario') }}" id="formActualizarUsurios">
                        @csrf
                        <div class="form-row">
                            <div class="col-lg-12 centrar text-center">
                                <p class="text-center ">Llena los siguientes datos</p>
                            </div>
                        </div>
                        <div class="form-row separacion-100 quitar-separacion-sm mt-lg-5 mb-lg-5">
                            <div class="form-group col-lg-12 col-md-12 text-left">
                                <label for="nombreUsuUpdate"><span class="form-label-g">Nombre <span
                                            class="text-danger">*</span></span>
                                </label>
                                <input type="text" class="form-control-login" id="nombreUsuUpdate"
                                    name="nombreUsuUpdate">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 text-left">
                                <label for="emailUsuUpdate"><span class="form-label-g">Email <span
                                            class="text-danger">*</span></span>
                                </label>
                                <input type="text" class="form-control-login" id="emailUsuUpdate" name="emailUsuUpdate">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 text-left">
                                <label for="passUsuUpdate"><span class="form-label-g">Contraseña <span
                                            class="text-danger">*</span></span>
                                </label>
                                <input type="text" class="form-control-login" id="passUsuUpdate" name="passUsuUpdate">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 text-left">
                                <label for="tipoUsuUpdate"><span class="form-label-g">Tipo de usuario<span
                                            class="text-danger">*</span></span>
                                </label>
                                <select type="text" class="form-control-login" id="tipoUsuUpdate" name="tipoUsuUpdate">

                                </select>
                            </div>
                            <input type="hidden" name="idUpdateUsuario" id="idUpdateUsuario">

                            <a class="btn btn-success btn-block text-white"
                                onclick="actualizarAdminUsuarios()">Actualizar
                                usuario</a>
                        </div>
                    </form>
                </div>
                <div class="espacio-50"></div>
            </div>
        </div>
    </div>
</div>
<form method="POST" action="{{ route('eliminar-usuario') }}" id="formUsuarioEliminar">
    @csrf
    <input type="hidden" name="idDeleteUsuario" id="idDeleteUsuario">
</form>
<!-- Nóminas -->
<div class="modal fade" id="modalRegistroNomina" tabindex="-1" role="dialog" aria-labelledby="modalRegistroNominaLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-lg-login" role="document">
        <div class="modal-content modal-content-login">
            <div class="modal-header modal-header-login border-none">
                <h2 class="modal-title text-center font-weight-bold ml-3" id="modalRegistroNominaLabel">
                    Registrar nómina</h2>
                <button type="button" class="close close-login" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="POST" action="{{ route('registro-nomina') }}" id="formNominaRegistro">
                        @csrf
                        <div class="form-row">
                            <div class="col-lg-12 centrar text-center">
                                <p class="text-center ">Llena los siguientes datos</p>
                            </div>
                        </div>
                        <div class="form-row separacion-100 quitar-separacion-sm mt-lg-5 mb-lg-5">
                            <div class="form-group col-lg-12 col-md-12 text-left">
                                <label for="direccion"><span class="form-label-g">Dirección <span
                                            class="text-danger">*</span></span>
                                </label>
                                <input type="text" class="form-control-login" id="direccion" name="direccion">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 text-left">
                                <label for="cuenta"><span class="form-label-g">Cuenta <span
                                            class="text-danger">*</span></span>
                                </label>
                                <input type="text" class="form-control-login" id="cuenta" name="cuenta">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 text-left">
                                <label for="banco"><span class="form-label-g">Banco <span
                                            class="text-danger">*</span></span>
                                </label>
                                <input type="text" class="form-control-login" id="banco" name="banco">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 text-left">
                                <label for="cantidad_bruto"><span class="form-label-g">Cantidad en bruto que ganas<span
                                            class="text-danger">*</span></span>
                                </label>
                                <input type="number" class="form-control-login" id="cantidad_bruto"
                                    name="cantidad_bruto">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 text-left">
                                <label for="telefono"><span class="form-label-g">Teléfono<span
                                            class="text-danger">*</span></span>
                                </label>
                                <input type="text" class="form-control-login" id="telefono" name="telefono">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 text-left">
                                <label for="idUsuario"><span class="form-label-g">Usuario<span
                                            class="text-danger">*</span></span>
                                </label>
                                <select class="form-control-login" id="idUsuario" name="idUsuario">
                                    <option value="0" selected disabled>Selecciona una opción</option>
                                    @foreach ($usuarios as $key => $usuario)
                                    <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <a class="btn btn-success btn-block text-white" onclick="registrarNomina()">Registrar
                                datos</a>
                        </div>
                    </form>
                </div>
                <div class="espacio-50"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalActualizarNomina" tabindex="-1" role="dialog"
    aria-labelledby="modalActualizarNominaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-lg-login" role="document">
        <div class="modal-content modal-content-login">
            <div class="modal-header modal-header-login border-none">
                <h2 class="modal-title text-center font-weight-bold ml-3" id="modalActualizarNominaLabel">
                    Actualizar nómina</h2>
                <button type="button" class="close close-login" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="POST" action="{{ route('actualizar-nomina') }}" id="formNominaEditar">
                        @csrf
                        <div class="form-row">
                            <div class="col-lg-12 centrar text-center">
                                <p class="text-center ">Llena los siguientes datos</p>
                            </div>
                        </div>
                        <div class="form-row separacion-100 quitar-separacion-sm mt-lg-5 mb-lg-5">
                            <div class="form-group col-lg-12 col-md-12 text-left">
                                <label for="direccionUpdate"><span class="form-label-g">Dirección <span
                                            class="text-danger">*</span></span>
                                </label>
                                <input type="text" class="form-control-login" id="direccionUpdate"
                                    name="direccionUpdate">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 text-left">
                                <label for="cuentaUpdate"><span class="form-label-g">Cuenta <span
                                            class="text-danger">*</span></span>
                                </label>
                                <input type="text" class="form-control-login" id="cuentaUpdate" name="cuentaUpdate">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 text-left">
                                <label for="bancoUpdate"><span class="form-label-g">Banco <span
                                            class="text-danger">*</span></span>
                                </label>
                                <input type="text" class="form-control-login" id="bancoUpdate" name="bancoUpdate">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 text-left">
                                <label for="cantUpdateidad_bruto"><span class="form-label-g">Cantidad en bruto que
                                        ganas<span class="text-danger">*</span></span>
                                </label>
                                <input type="number" class="form-control-login" id="cantidad_brutoUpdate"
                                    name="cantidad_brutoUpdate">
                            </div>
                            <div class="form-group col-lg-12 col-md-12 text-left">
                                <label for="telefonoUpdate"><span class="form-label-g">Teléfono<span
                                            class="text-danger">*</span></span>
                                </label>
                                <input type="text" class="form-control-login" id="telefonoUpdate" name="telefonoUpdate">
                            </div>

                            <input type="hidden" name="idUpdateNomina" id="idUpdateNomina">
                            <a class="btn btn-success btn-block text-white" onclick="actualizarNomina()">Actualizar
                                datos</a>
                        </div>
                    </form>
                </div>
                <div class="espacio-50"></div>
            </div>
        </div>
    </div>
</div>
<form method="POST" action="{{ route('eliminar-nomina') }}" id="formNominaEliminar">
    @csrf
    <input type="hidden" name="idDeleteNomina" id="idDeleteNomina">
</form>

<script>
const dataTable = (id) => {

    $(document).ready(function() {

        $(`#${id} thead th`).each(function() {
            var title = $(`#${id} thead th`).eq($(this).index()).text();
            $(this).html(title + '<input type="text" class="form-control" placeholder="Buscar" />');
        });

        var table = $(`#${id}`).DataTable({
            dom: 'Bfrtip',
            "language": {
                "decimal": "",
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Demostración _START_ en _END_, de _TOTAL_ usuarios registrados",
                "infoEmpty": "Showing 0 to 0 of 0 entries",
                "infoFiltered": "(filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Seleccionar el número de entradas _MENU_",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Búsqueda global:",
                "zeroRecords": "No se encontraron registros coincidentes",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": activar para ordenar la columna ascendente",
                    "sortDescending": ": activar para ordenar la columna descendente"
                }
            },
            dom: 'lBfrtip',
            buttons: [{
                    extend: 'print',
                    text: '<i class="fas fa-print"></i>',
                    titleAttr: 'Imprimir tabla',
                    exportOptions: {
                        columns: ':visible'
                    },
                    customize: function(win) {
                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                '<img src="../theme-assets/images/China-Logo.png" style="position:absolute; top:0; left:0;" />'
                            );

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i>',
                    titleAttr: 'Exportar a Excel',
                    autoFilter: true,
                    sheetName: 'Exported data',
                    exportOptions: {
                        columns: ':visible'
                    }


                },
                {
                    extend: 'csvHtml5',
                    text: '<i class="fas fa-file-csv"></i>',
                    titleAttr: 'Exportar a CSV',
                    charset: 'UTF-16LE',
                    bom: true,
                    autoFilter: false,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    messageTop: '',
                    text: '<i class="fas fa-file-pdf"></i>',
                    titleAttr: 'Exportar a PDF',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    filename: 'Usuarios-Wavin',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'colvis',
                    text: '<i class="fas fa-columns"> </i>',
                    titleAttr: 'Visibilidad de las columnas',
                },


            ],
            "lengthMenu": [
                [10, 20, 30, 50, -1],
                [10, 20, 30, 50, "Todos"]
            ]
        });
        table.columns().eq(0).each(function(colIdx) {
            $('input', table.column(colIdx).header()).on('keyup change', function() {
                table
                    .column(colIdx)
                    .search(this.value)
                    .draw();
            });
        });

        // table.columns([6, 7, 9]).visible(false);

    });
}

dataTable('datatable-usuarios');
dataTable('datatable-nominas');
</script>


@endsection