$(document).ready(function () {
  $("#cerrar").click(function () {
    Swal.fire({
      //position: 'top-end',
      icon: "success",
      title: "Cerro sesión correctamente",
      showConfirmButton: false,
      timer: 1500,
    }).then(function () {
      window.location = "logout.php";
    });

    return false;
  });
});
