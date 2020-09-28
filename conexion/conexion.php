<?php
$servidor="mysql:dbname=dba_parcial2;host=127.0.0.1";
$usuario="root";
$password="";
try {
    $pdo = new PDO($servidor,$usuario,$password);
   // echo "Conectado..";
} catch (PDOException $e) {
    echo "Conexion mala : (".$e->getMessage();
}
?>