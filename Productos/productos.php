<?php    
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $txtProducto=(isset($_POST['txtProducto']))?$_POST['txtProducto']:"";
    $txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
    $txtPrecio= (isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
    $accion=(isset($_POST['accion']))?$_POST['accion']:"";
    $accionAgregar="";
    $accionModificar=$accionEliminar=$accionCancelar="disabled";
    $mostrarModal=false;    
    include ("../conexion/conexion.php");
    switch ($accion) {        
        case 'btnAgregar':  
            $sentencia=$pdo->prepare("INSERT INTO task(title,descripcion,precio)
            VALUES (:title,:descripcion,:precio) ");
            //$sentencia->bindParam('id',$txtID);
            $sentencia->bindParam(':title',$txtProducto);
            $sentencia->bindParam(':descripcion',$txtDescripcion);
            $sentencia->bindParam(':precio',$txtPrecio);
            $sentencia->execute();            
            //echo "Presionaste btnAgregar";  
            //echo $txtDescripcion;
            header('Location: index.php');
            break;
        case 'btnModificar':
            $sentencia=$pdo->prepare("UPDATE task SET  
            title=:title,
            descripcion=:descripcion,
            precio=:precio WHERE 
            id =:id"); 
            //$sentencia->bindParam('id',$txtID);
            $sentencia->bindParam(':title',$txtProducto);
            $sentencia->bindParam(':descripcion',$txtDescripcion);
            $sentencia->bindParam(':precio',$txtPrecio);
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();  
            header('Location: index.php');
            break;        
        case 'btnEliminar':
            $sentencia=$pdo->prepare("DELETE FROM task WHERE id =:id");             
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();  
            header('Location: index.php');
            break;
        case 'btnCancelar':
            header('Location: index.php');
            break;
        case "Seleccionar":
            $accionAgregar="disabled";
            $accionModificar=$accionEliminar=$accionCancelar="";
            $mostrarModal=true;
            break;
        default:
            # code...
            break;
    }
    $sentencia = $pdo->prepare("SELECT * FROM task WHERE 1");
    $sentencia->execute();
    $listaTask=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    //print_r($listaTask);
?>