<?php
    include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>

</head>
<body>
    <?php
        if(isset($_POST['enviar'])){
            $id=$_POST['id'];
            $nombre=$_POST['nombre'];
            $ci=$_POST['ci'];

            $sql="update usuarios set nombre = '".$nombre."', ci= '".$ci."' where id = '".$id."'";
            $resultado = mysqli_query($conexion, $sql);

            if($resultado){
                echo "  <script language = 'JavaScript'>
                        alert('los datos se han actualizado');
                        location.assign('index.php');
                        </script>
                ";
            }else{
                echo "  <script language = 'javascript'>
                        alert('los datos NO se han actualizado');
                        location.assign('index.php');
                        </script>
                ";
            }
            mysqli_close($conexion);
        }else{
            $id=$_GET['id'];
            $sql="select * from usuarios where id='".$id."'";
            $resultado = mysqli_query($conexion, $sql);

            $fila = mysqli_fetch_assoc($resultado);
            $nombre = $fila["nombre"];
            $ci = $fila["ci"];

            mysqli_close($conexion);
    ?>
    <h1>Editar</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label for="">nombre</label>
        <input type="text" name="nombre" value ="<?php  echo $nombre; ?>"><br>

        <label for="">CI</label>
        <input type="text" name="ci" value ="<?php  echo $ci;   ?>"><br>
        
        <input type="hidden" name ="id" value="<?php    echo $id;   ?>">

        <input type="submit" name="enviar" value="actualzar">
        <a href="index.php">Regresar</a>
    </form>
    <?php
        }
    ?>
</body>
</html>