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

const registrarUsuario = () => {
    document.getElementById("formRegistro").submit();
};
