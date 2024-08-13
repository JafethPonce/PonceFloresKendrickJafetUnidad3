$(document).ready(function () {
  $("#modalContainer").load("modal.php", function () {
    // Inicializar el selector de emojis después de cargar el modal
    initializeEmojiPicker();

    // El código para manejar el envío del formulario puede ir aquí
    $("#addNoteForm").on("submit", function (event) {
      event.preventDefault(); // Evitar el envío tradicional del formulario
      var formData = $(this).serialize();

      $.ajax({
        url: "procesar_nota.php", // Cambia esta URL a la ruta de tu archivo PHP que procesará el formulario
        method: "POST",
        data: formData,
        success: function (response) {
          // Aquí puedes manejar la respuesta del servidor
          Swal.fire({
            icon: "success",
            title: "Nota agregada",
            text: "La nota se ha agregado correctamente",
            showConfirmButton: true,
          }).then(() => {
            location.reload(); // Recargar la página para mostrar la nueva nota
          });
        },
        error: function (xhr, status, error) {
          // Manejo de errores
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Ocurrió un error al agregar la nota. Inténtalo nuevamente.",
            showConfirmButton: true,
          });
        },
      });
    });
  });
});

function initializeEmojiPicker() {
  // Verifica si el botón de emojis está presente
  const button = document.querySelector("#emoji-button");
  if (button) {
    // Inicializa el EmojiButton
    const picker = new EmojiButton();
    const noteContent = document.querySelector("#noteContent");

    picker.on("emoji", (emoji) => {
      noteContent.value += emoji;
    });

    button.addEventListener("click", () => {
      picker.togglePicker(button);
    });
  }
}
