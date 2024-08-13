let timeout;

document.onmousemove = resetTimer;
document.onkeydown = resetTimer;

function resetTimer() {
  clearTimeout(timeout);
  timeout = setTimeout(logout, 120000); // 2 minutos de inactividad
}

function logout() {
  Swal.fire({
    title: "Cierre de Sesión Automática",
    text: "Si deseas salir haz clic en Cerrar Sesión o en Cancelar para continuar trabajando",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Cerrar Sesión",
    cancelButtonText: "Cancelar",
    confirmButtonClass: "btn-danger",
    showLoaderOnConfirm: true,
    preConfirm: () => {
      return fetch("logout.php", {
        method: "POST",
      })
        .then((response) => {
          if (!response.ok) {
            throw new Error(response.statusText);
          }
          return response;
        })
        .catch((error) => {
          Swal.showValidationMessage(`Request failed: ${error}`);
        });
    },
    allowOutsideClick: () => !Swal.isLoading(),
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "logout.php";
    }
  });
}

resetTimer();
