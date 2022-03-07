<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crear</title>

</head>
<body>
    <?php
        if(isset($_POST['enviar'])){
            $nombre =$_POST['nombre'];
            $ci=$_POST['ci'];

            include("conexion.php");
            $sql =" insert into usuarios (nombre,ci) 
                    values('".$nombre."', '".$ci."')";

            $resultado = mysqli_query($conexion, $sql);

            if($resultado){
                echo "  <script language = 'JavaScript'>
                        alert('los datos fueron guardados');
                        location.assign('index.php');
                        </script>
                    ";
            }else{
                echo "  <script language = 'javascript'>
                alert('los datos NO fueron guardados');
                location.assign('index.php');
                </script>
            ";
            }
            mysqli_close($conexion);
        }else{

    
    ?>
    <h1>crear</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label for="">nombre</label>
        <input type="text" name="nombre"> <br>
        <label for="">ci</label>
        <input type="text" name="ci"> <br>
        <input type="submit" name="enviar" value ="crear">
        <a href="index.php">regresar</a>
    </form>
    <?php
        }
    ?>
</body>
</html>