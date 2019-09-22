<?php
include_once 'models/alumno.php';
?>
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

<div class="center">Sitio Consulta</div>
<div id="respuesta" class="center"></div>
<div class="center">
    <table class="table responsive">
    <thead>
        <tr>
            <td>Matricula</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td></td>
            <td></td>
        </tr>
    </thead>
    <tbody id="tbody-alumnos">
        <?php 
            foreach ($this->alumnos as $row) {
                $alumno = new Alumno;
                $alumno = $row;
                ?>
                <tr id="fila-<?php echo $alumno->matricula; ?>">
                    <td><?php echo $alumno->matricula; ?></td>
                    <td><?php echo $alumno->nombre; ?></td>
                    <td><?php echo $alumno->apellido; ?></td>
                    <td><a href="<?php echo constant('URL')."consulta/verAlumno/".$alumno->matricula; ?>">Editar</a></td>
                    <!-- <td><a href="<?php echo constant('URL')."consulta/eliminarAlumno/".$alumno->matricula; ?>">Eliminar</a></td> -->
                    <td><button class="btneliminar" data-matricula="<?php echo $alumno->matricula; ?>">Eliminar</button></td>
                </tr>
                <?php
            }
        ?>
    </tbody>
    </table>
</div>
<?php require_once 'views/footer.php'; ?>
<script src="<?php echo constant('URL'); ?>statics/js/app.js"></script>
</body>
</html>