const validar_email = (email) => {
    const regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
};

const contacto = () => {
    Swal.fire({
        icon: "success",
        title: "Gracias por contactarnos",
        text: "Pronto nos pondremos en contacto",
        showCloseButton: true,
        showCancelButton: false,
        confirmButtonText: "Entendido",
    });
};

// nóminas
const infoNomina = () => {
    Swal.fire({
        title: "Nómina no encontrada",
        text:
            "En estos momentos no tenemos información sobre tu nómina, regresa en unos minutos y revisa de nuevo.",
        imageUrl: "./img/datos_vacios2.svg",
        imageWidth: 400,
        imageHeight: 200,
        showCloseButton: true,
        showCancelButton: false,
        imageAlt: "Custom image",
        confirmButtonText: "Entendido",
    });
};
const eliminarNomina = (id) => {
    document.getElementById("idDeleteNomina").value = id;
    Swal.fire({
        title: "¿Estas seguro(a) de eliminar esta nómina?",
        text: "Una vez eliminada no podrás revertir esto",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminala",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("formNominaEliminar").submit();
        }
    });
};
const mostrarDatosNominas = (
    direccion,
    cuenta,
    banco,
    cantidad,
    telefono,
    id
) => {
    const direccionUpdate = document.getElementById("direccionUpdate");
    const cuentaUpdate = document.getElementById("cuentaUpdate");
    const bancoUpdate = document.getElementById("bancoUpdate");
    const cantidad_brutoUpdate = document.getElementById(
        "cantidad_brutoUpdate"
    );
    const telefonoUpdate = document.getElementById("telefonoUpdate");
    const idUpdateNomina = document.getElementById("idUpdateNomina");

    direccionUpdate.value = direccion;
    cuentaUpdate.value = cuenta;
    bancoUpdate.value = banco;
    cantidad_brutoUpdate.value = cantidad;
    telefonoUpdate.value = telefono;
    idUpdateNomina.value = id;
};

const actualizarNomina = () => {
    const direccion = document.getElementById("direccionUpdate").value;
    const cuenta = document.getElementById("cuentaUpdate").value;
    const banco = document.getElementById("bancoUpdate").value;
    const cantidad_bruto = document.getElementById("cantidad_brutoUpdate")
        .value;
    const telefono = document.getElementById("telefonoUpdate").value;

    if (direccion === "") {
        Swal.fire({
            icon: "info",
            title: "Campo vacío",
            html: 'El campo <b>"Dirección"</b> no puede quedar vacío',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (cuenta === "") {
        Swal.fire({
            icon: "info",
            title: "Campo vacío",
            html: 'El campo <b>"Cuenta"</b> no puede quedar vacío',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (banco === "") {
        Swal.fire({
            icon: "info",
            title: "Campo vacío",
            html: 'El campo <b>"Banco"</b> no puede quedar vacío',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (cantidad_bruto === "") {
        Swal.fire({
            icon: "info",
            title: "Campo vacío",
            html:
                'El campo <b>"Cantidad en bruto que gana"</b> no puede quedar vacío',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (telefono === "") {
        Swal.fire({
            icon: "info",
            title: "Campo vacío",
            html: 'El campo <b>"Teléfono"</b> no puede quedar vacío',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (telefono.length > 10 || telefono.length < 10) {
        Swal.fire({
            icon: "info",
            title: "Formato incorrecto",
            html: "El formato del teléfono debe de ser a 10 dígitos",
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    }
    document.getElementById("formNominaEditar").submit();
};

const registrarNomina = () => {
    const direccion = document.getElementById("direccion").value;
    const cuenta = document.getElementById("cuenta").value;
    const banco = document.getElementById("banco").value;
    const cantidad_bruto = document.getElementById("cantidad_bruto").value;
    const telefono = document.getElementById("telefono").value;
    const usuario = document.getElementById("idUsuario").value;

    if (direccion === "") {
        Swal.fire({
            icon: "info",
            title: "Campo vacío",
            html: 'El campo <b>"Dirección"</b> no puede quedar vacío',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (cuenta === "") {
        Swal.fire({
            icon: "info",
            title: "Campo vacío",
            html: 'El campo <b>"Cuenta"</b> no puede quedar vacío',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (banco === "") {
        Swal.fire({
            icon: "info",
            title: "Campo vacío",
            html: 'El campo <b>"Banco"</b> no puede quedar vacío',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (cantidad_bruto === "") {
        Swal.fire({
            icon: "info",
            title: "Campo vacío",
            html:
                'El campo <b>"Cantidad en bruto que gana"</b> no puede quedar vacío',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (telefono === "") {
        Swal.fire({
            icon: "info",
            title: "Campo vacío",
            html: 'El campo <b>"Teléfono"</b> no puede quedar vacío',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (telefono.length > 10 || telefono.length < 10) {
        Swal.fire({
            icon: "info",
            title: "Formato incorrecto",
            html: "El formato del teléfono debe de ser a 10 dígitos",
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (usuario === "0") {
        Swal.fire({
            icon: "info",
            title: "Campo no seleccionado",
            html: 'El campo <b>"Usuario"</b> debe de ser seleccionado',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    }
    document.getElementById("formNominaRegistro").submit();
};

// Usuarios

const mostrarDatosUsuarios = (nombre, email, tipoUsuario, id) => {
    const nombreUsu = document.getElementById("nombreUsuUpdate");
    const emailUsu = document.getElementById("emailUsuUpdate");
    const tipoUsu = document.getElementById("tipoUsuUpdate");
    const idUpdateUsuario = document.getElementById("idUpdateUsuario");

    nombreUsu.value = nombre;
    emailUsu.value = email;
    idUpdateUsuario.value = id;

    if (tipoUsuario === "admin") {
        tipoUsu.innerHTML = `        
        <option class="selected" value="admin">Administrador</option>
        <option class="" value="user">Usuario</option>`;
    } else if (tipoUsuario === "user") {
        tipoUsu.innerHTML = `        
        <option class="selected" value="user">Usuario</option>
        <option class="" value="admin">Administrador</option>`;
    }
};

const eliminarUsuario = (id) => {
    document.getElementById("idDeleteUsuario").value = id;
    Swal.fire({
        title: "¿Estas seguro(a) de eliminar este usuario?",
        text: "Una vez eliminado no podrás revertir esto",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminala",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("formUsuarioEliminar").submit();
        }
    });
};

const actualizarAdminUsuarios = () => {
    const nombreUsuUpdate = document.getElementById("nombreUsuUpdate").value;
    const emailUsuUpdate = document.getElementById("emailUsuUpdate").value;

    if (nombreUsuUpdate === "") {
        Swal.fire({
            icon: "info",
            title: "Campo vacío",
            html: 'El campo <b>"Nombre"</b> no puede quedar vacío',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (emailUsuUpdate === "") {
        Swal.fire({
            icon: "info",
            title: "Campo vacío",
            html: 'El campo <b>"Email"</b> no puede quedar vacío',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (!validar_email(emailUsuUpdate)) {
        Swal.fire({
            title: "Correo no valido.",
            icon: "info",
            html: "Escribe correctamente tu correo electrónico.",
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    }
    document.getElementById("formActualizarUsurios").submit();
};
const registrarAdminUsuarios = () => {
    const nombreUsu = document.getElementById("nombreUsu").value;
    const emailUsu = document.getElementById("emailUsu").value;
    const passUsu = document.getElementById("passUsu").value;
    const tipoUsu = document.getElementById("tipoUsu").value;

    if (nombreUsu === "") {
        Swal.fire({
            icon: "info",
            title: "Campo vacío",
            html: 'El campo <b>"Nombre"</b> no puede quedar vacío',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (emailUsu === "") {
        Swal.fire({
            icon: "info",
            title: "Campo vacío",
            html: 'El campo <b>"Email"</b> no puede quedar vacío',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (!validar_email(emailUsu)) {
        Swal.fire({
            title: "Correo no valido.",
            icon: "info",
            html: "Escribe correctamente tu correo electrónico.",
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (passUsu === "") {
        Swal.fire({
            icon: "info",
            title: "Campo vacío",
            html: 'El campo <b>"Contraseña"</b> no puede quedar vacío',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (tipoUsu === "0") {
        Swal.fire({
            icon: "info",
            title: "Campo no seleccionado",
            html: 'El campo <b>"Tipo usuario"</b> debe de ser seleccionado',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    }
    document.getElementById("formRegistroUsurios").submit();
};

const registrarUsuario = () => {
    const nameText = document.getElementById("nameText").value;
    const emailText = document.getElementById("emailText").value;
    const passwordText = document.getElementById("passwordText").value;
    const passwordText2 = document.getElementById("passwordText2").value;

    if (nameText === "") {
        Swal.fire({
            icon: "info",
            title: "Campo vacío",
            html: 'El campo <b>"Nombre"</b> no puede quedar vacío',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (emailText === "") {
        Swal.fire({
            icon: "info",
            title: "Campo vacío",
            html: 'El campo <b>"Email"</b> no puede quedar vacío',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (!validar_email(emailText)) {
        Swal.fire({
            title: "Correo no valido.",
            icon: "info",
            html: "Escribe correctamente tu correo electrónico.",
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (passwordText === "") {
        Swal.fire({
            icon: "info",
            title: "Campo vacío",
            html: 'El campo <b>"Contraseña"</b> no puede quedar vacío',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (passwordText2 === "") {
        Swal.fire({
            icon: "info",
            title: "Campo vacío",
            html: 'El campo <b>"Repetir contraseña"</b> no puede quedar vacío',
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    } else if (passwordText !== passwordText2) {
        Swal.fire({
            icon: "info",
            title: "Contraseñas incorrectas",
            html: "Las contraseñas no coinciden",
            showCloseButton: true,
            showCancelButton: false,
            confirmButtonText: "Aceptar",
        });
        return false;
    }
    document.getElementById("formRegistro").submit();
};
