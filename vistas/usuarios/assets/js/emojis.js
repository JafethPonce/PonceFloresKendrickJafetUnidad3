document.addEventListener("DOMContentLoaded", () => {
  // Inicializa el picker solo cuando el modal se muestra
  $(document).on("shown.bs.modal", "#yourModalID", function () {
    const button = document.querySelector("#emoji-button");
    if (button) {
      const picker = new EmojiButton();
      const noteContent = document.querySelector("#noteContent");

      picker.on("emoji", (emoji) => {
        noteContent.value += emoji;
      });

      button.addEventListener("click", () => {
        picker.togglePicker(button);
      });
    }
  });
});
