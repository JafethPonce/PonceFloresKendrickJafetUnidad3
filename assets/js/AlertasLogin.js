$(document).ready(function () {
  $("#iniciar").click(function () {
    if ($("#celular").val() == "") {
      Swal.fire({
        icon: "warning",
        title: "Completa el campo",
        text: "Debe de ingresar el correo o celular",
        //position: 'top-end',
        showConfirmButton: false,
        confirmButtonText: "Aceptar",
        timerProgressBar: true,
        timer: 2500,

        //}).then(function(){
        //window.location="sweetalert.php"
      });

      return false;
    } else if ($("#psw").val() == "") {
      Swal.fire({
        icon: "warning",
        title: "Completa el campo",
        text: "Debe de ingresar la contraseña",
        //position: 'top-end',
        showConfirmButton: false,
        confirmButtonText: "Aceptar",
        timerProgressBar: true,
        timer: 2500,

        //}).then(function(){
        //window.location="sweetalert.php"
      });

      return false;
    }
  });
});
