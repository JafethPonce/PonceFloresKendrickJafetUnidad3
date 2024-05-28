<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario de Contacto</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Formulario de Contacto</h2>
        <form id="contactForm" action="process_contact.php" method="post" novalidate>
            <div class="form-group">
                <label for="nombres">Nombres</label>
                <input type="text" id="nombres" name="nombres" required>
                <div class="invalid-feedback">
                    Por favor, ingrese su nombre.
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <div class="invalid-feedback">
                    Por favor, ingrese un email válido.
                </div>
            </div>
            <div class="form-group">
                <label for="asunto">Asunto</label>
                <input type="text" id="asunto" name="asunto" required>
                <div class="invalid-feedback">
                    Por favor, ingrese un asunto.
                </div>
            </div>
            <div class="form-group">
                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="mensaje" rows="5" required></textarea>
                <div class="invalid-feedback">
                    Por favor, ingrese su mensaje.
                </div>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </div>

    <script>
        // Bootstrap custom validation script
        (function () {
            'use strict'

            var forms = document.querySelectorAll('form')

            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>
</html>
