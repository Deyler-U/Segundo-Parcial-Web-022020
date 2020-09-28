<?php
    require 'productos.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcial_II Productos </title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js""></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
    <form action="" method="post" ectype="multipart/form-data">
    <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Productos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class = "form-row">            
            <label for="">ID:</label>
        <input type="text" class = "form-control" name="txtID" value="<?php echo $txtID;?>" placeholder="" id="txt1" require="">
        <br>

        <label for="">Producto:</label>
        <input type="text" class = "form-control" name="txtProducto" value="<?php echo $txtProducto;?>" placeholder="" id="txt2" require="">
        <br>

        <label for="">Descripcion:</label>
        <input type="text" class = "form-control" name="txtDescripcion" value="<?php echo $txtDescripcion;?>" placeholder="" id="txt3" require="">
        <br>

        <label for="">Precio:</label>
        <input type="number" class = "form-control" name="txtPrecio" value="<?php echo $txtPrecio;?>" placeholder="" id="txt4" require="">
        <br>         

        </div>
      </div>
      <div class="modal-footer">  
        <button value="btnAgregar" <?php echo $accionAgregar;?> class="btn btn-success" type="submit" name="accion">Agregar</button>
        <button value="btnModificar" <?php echo $accionModificar;?> class="btn btn-warning" type="submit" name="accion">Modificar</button>
        <button value="btnEliminar" onclick="return Confirmar('¿Desea Eliminar Registro?');" <?php echo $accionEliminar;?> class="btn btn-danger" type="submit" name="accion">Eliminar</button>
        <button value="btnCancelar" <?php echo $accionCancelar;?> class="btn btn-primary" type="submit" name="accion">Cancelar</button>      
      </div>
    </div>
  </div>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar Registro +
</button>
<br>             
<br>
    </form>
    <div class="row">
        <table class ="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                   <th>id</th>
                    <th>Producto</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <?php foreach($listaTask as $task){ ?>
            <tr>
                <td><?php echo $task['id']; ?></td>            
                <td><?php echo $task['title']; ?></td>
                <td><?php echo $task['descripcion']; ?></td>
                <td><?php echo $task['precio']; ?></td>
                <td>
                <form action="" method="post">
                <input type="hidden" name="txtID" value="<?php echo $task['id']; ?>">
                <input type="hidden" name="txtProducto"value="<?php echo $task['title']; ?>">
                <input type="hidden" name="txtDescripcion"value="<?php echo $task['descripcion']; ?>">
                <input type="hidden" name="txtPrecio"value="<?php echo $task['precio']; ?>">            
                <input type="submit" value="Seleccionar" name="accion"></td>
                <button value="btnEliminar" onclick="return Confirmar('¿Desea Eliminar Registro?');" type="submit" name="accion"></button>
                </form>                
            </tr>
            <?php } ?>
        </table>
    </div>
    <?php if($mostrarModal){?>
        <script>
            $('#exampleModal').modal('show');
        </script>
    <?php } ?>
    <script>
        funcion Confirmar(Mensaje){
            return (confirm(Mensaje))?true:false;
        }
    </script>
</div>
</body>
</html>