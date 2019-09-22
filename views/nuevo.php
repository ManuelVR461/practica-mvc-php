<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php require_once 'views/header.php'; ?>

        <div class="center">Sitio Nuevo</div>

        <div class="center"><?php echo $this->mensaje; ?></div>

        <form action="<?php echo constant('URL');?>nuevo/registrarAlumno" method="post">
            <p>
                <label for="matricula">Matricula</label><br>
                <input type="text" name="matricula" id="">
            </p>
            <p>
                <label for="nombre">Nombre</label><br>
                <input type="text" name="nombre" id="">
            </p>
            <p>
                <label for="apellido">Apellido</label><br>
                <input type="text" name="apellido" id="">
            </p>
            <p>
                <input type="submit" value="Registrar Nuevo">
            </p>
        </form>

    <?php require_once 'views/footer.php'; ?>
</body>
</html>