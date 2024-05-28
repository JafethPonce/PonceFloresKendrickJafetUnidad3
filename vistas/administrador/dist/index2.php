<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="shortcut icon" type="image/x-icon" href="producto.png">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="DataTables/datatables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="DataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="js/script.js"></script>
    <style>
        button.dt-button.btn-primary{
            background:var(--bs-primary)!important;
            color:white;
        }
    </style>
</head>

<body class="">
<nav class="navbar navbar-expand-lg navbar-light bg-dark bg-gradient" >
  <div class="container" >
    <img src="inventario.png" width="100px">
    <a class="navbar-brand text-light text-shadow" href="#" target="_blank">CrudProductos</a>
  </div>
</nav>

    <div class="container py-5 h-100">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-center"><b>Productos-CRUD</b></h3>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12" id="msg"></div>
        </div>
        <div class="row">
                <!-- Tabla generada para la muestra de los datos de la tabla/Front -->
            <div class="col-lg-12">
                <table class="table table-hover table-bordered table-striped" id="authors-tbl">
                    <thead>
                        <tr class="bg-dark text-light bg-gradient bg-opacity-150">
                            <th class="px-1 py-1 text-center">#</th>
                            <th class="px-1 py-1 text-center">Descripción</th>
                            <th class="px-1 py-1 text-center">Costo</th>
                            <th class="px-1 py-1 text-center">Stock</th>
                            <th class="px-1 py-1 text-center">Código del producto:</th>
                            <th class="px-1 py-1 text-center">Acción</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="bg-dark text-light bg-gradient bg-opacity-150">
                            <th class="px-1 py-1 text-center">#</th>
                            <th class="px-1 py-1 text-center">Descripción</th>
                            <th class="px-1 py-1 text-center">Costo</th>
                            <th class="px-1 py-1 text-center">Correo</th>
                            <th class="px-1 py-1 text-center">Código del producto:</th>
                            <th class="px-1 py-1 text-center">Acción</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- Agregar producto/Aquí comenzamos el front para la inserccion de datos -->
    <div class="modal fade" id="add_modal" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Producto:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="new-author-frm">
                            <div class="form-group">
                                <label for="descripcion" class="control-label">Descripción:</label>
                                <input type="text" class="form-control rounded-0" id="descripcion" name="descripcion" required>
                            </div>
                            <div class="form-group">
                                <label for="costo" class="control-label">Costo:</label>
                                <input type="text" class="form-control rounded-0" id="costo" name="costo" required>
                            </div>
                            <div class="form-group">
                                <label for="stock" class="control-label">Stock:</label>
                                <input type="text" class="form-control rounded-0" id="stock" name="stock" required>
                            </div>
                            <div class="form-group">
                                <label for="codigo" class="control-label">Código del producto:</label>
                                <input type="text" class="form-control rounded-0" id="codigo" name="codigo" required>
                            </div>
                        </form>
                    </div>
                </div>
                    <!--Botones para guardar y cerrar dentro de agregar un nuevo producto -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="new-author-frm">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Aquí termina el front de agregar un nuevo producto -->

    <!-- Editar los datos del producto -->
    <div class="modal fade" id="edit_modal" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar detalles del producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="edit-author-frm">
                            <input type="hidden" name="id">
                            <div class="form-group">
                                <label for="descripcion" class="control-label">Descripción:</label>
                                <input type="text" class="form-control rounded-0" id="descripcion" name="descripcion" required>
                            </div>
                            <div class="form-group">
                                <label for="costo" class="control-label">Costo:</label>
                                <input type="text" class="form-control rounded-0" id="costo" name="costo" required>
                            </div>
                            <div class="form-group">
                                <label for="stock" class="control-label">Stock:</label>
                                <input type="text" class="form-control rounded-0" id="stock" name="stock" required>
                            </div>
                            <div class="form-group">
                                <label for="codigo" class="control-label">Código del producto:</label>
                                <input type="text" class="form-control rounded-0" id="codigo" name="codigo" required>
                            </div>
                        </form>
                    </div>
                </div>
    <!-- Botones del apartado de editar -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="edit-author-frm">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Termina el apartado de editar el producto -->


    <!-- Apartado de eliminar el producto existente -->
    <div class="modal fade" id="delete_modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar</h5>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="" id="delete-author-frm">
                            <input type="hidden" name="id">
                            <p>¿Estas seguro de eliminar <b><span id="name"></span></b> el produto?</p>
                        </form>
                    </div>
                </div>
    <!-- Botones del apartado de eliminar -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" form="delete-author-frm">Sí</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Termina el apartado de eliminación de los datos existentes -->
</body>

</html>