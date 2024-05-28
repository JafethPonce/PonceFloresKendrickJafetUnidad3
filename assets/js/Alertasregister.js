$(document).ready(function () {
  let formatoemail = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
  let formatoTelefono = /^\d{10}$/;

  $("#registrar").click(function () {
    if ($("#nombre").val() == "") {
      Swal.fire({
        icon: "warning",
        title: "Completa el campo",
        text: "Debe de ingresar los nombres",
        //position: 'top-end',
        showConfirmButton: false,
        confirmButtonText: "Aceptar",
        timerProgressBar: true,
        timer: 2500,

        //}).then(function(){
        //window.location="sweetalert.php"
      });

      return false;
    } else if ($("#apellidos").val() == "") {
      Swal.fire({
        icon: "warning",
        title: "Completa el campo",
        text: "Debe de ingresar los apellidos",
        //position: 'top-end',
        showConfirmButton: false,
        confirmButtonText: "Aceptar",
        timerProgressBar: true,
        timer: 2500,

        //}).then(function(){
        //window.location="sweetalert.php"
      });

      return false;
    } else if ($("#celular").val() == "") {
      Swal.fire({
        icon: "warning",
        title: "Completa el campo",
        text: "Debe de ingresar el celular",
        //position: 'top-end',
        showConfirmButton: false,
        confirmButtonText: "Aceptar",
        timerProgressBar: true,
        timer: 2500,

        //}).then(function(){
        //window.location="sweetalert.php"
      });

      return false;
    } else if (!formatoTelefono.test($("#celular").val())) {
      Swal.fire({
        icon: "warning",
        title: "Formato incorrecto",
        text: "Debe ingresar 10 digitos",
        //position: 'top-end',
        showConfirmButton: false,
        confirmButtonText: "Aceptar",
        timerProgressBar: true,
        timer: 2500,

        //}).then(function(){
        //window.location="sweetalert.php"
      });

      return false;
    } else if ($("#email").val() == "") {
      Swal.fire({
        icon: "warning",
        title: "Completa el campo",
        text: "Debe de ingresar el email",
        //position: 'top-end',
        showConfirmButton: false,
        confirmButtonText: "Aceptar",
        timerProgressBar: true,
        timer: 2500,

        //}).then(function(){
        //window.location="sweetalert.php"
      });

      return false;
    } else if (!formatoemail.test($("#email").val())) {
      Swal.fire({
        icon: "warning",
        title: "Formato incorrecto",
        text: "Debe ingresar el formato correcto",
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
        text: "Debe ingresar la contraseña",
        //position: 'top-end',
        showConfirmButton: false,
        confirmButtonText: "Aceptar",
        timerProgressBar: true,
        timer: 2500,

        //}).then(function(){
        //window.location="sweetalert.php"
      });

      return false;
    } else if ($("#pswconfirmar").val() == "") {
      Swal.fire({
        icon: "warning",
        title: "Completa el campo",
        text: "Debe confirmar su contraseña",
        //position: 'top-end',
        showConfirmButton: false,
        confirmButtonText: "Aceptar",
        timerProgressBar: true,
        timer: 2500,

        //}).then(function(){
        //window.location="sweetalert.php"
      });

      return false;
    } else if ($("#pswconfirmar").val() !== $("#psw").val()) {
      Swal.fire({
        icon: "error",
        title: "Valida",
        text: "Debe de coincidir la contraseñas",
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
