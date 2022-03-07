<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>

    <!-- /* poner alerta de eliminacion para no borrar datos  alert*/ -->
    <script type="text/javascript">
        function confirmar(){
            return confirm('¿estas seguro?, se eliminaran los datos');
        }
    </script>
</head>
<body>
<?php
    include("conexion.php");
    $sql = "select * from usuarios";
    $resultado = mysqli_query($conexion, $sql);

?>
    <h1>Lista de Usuarios</h1>
    <a href="crear.php">nuevo usuario</a> <!-- agregar link -->
    
    <table>
        <thead>
            <tr>
                <th>no.</th>
                <th>nombre</th>
                <th>ci</th>
                <th>acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($filas = mysqli_fetch_assoc($resultado)) {

        ?>
            <tr>
                <td> <?php  echo $filas['id']  ?></td>       
                <td> <?php  echo $filas['nombre']    ?></td>
                <td> <?php  echo $filas['ci']   ?></td>
                <!-- para insertar colunma nueva -->
                <td>
                    <?php   echo "<a href = 'editar.php?id=".$filas['id']."'>editar</a>";     ?>

                    <?php echo "<a href = 'eliminar.php?id=".$filas['id']."' onclick='return confirmar()'>eliminar</a>"; ?>
                </td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
    <?php
        mysqli_close($conexion);
    ?>
</body>
</html>