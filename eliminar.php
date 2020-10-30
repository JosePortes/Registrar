<?php 
include './utilities.php';

session_start();

$Estudiante = $_SESSION['student'];

if(isset($_GET['id'])){

    $studentID = $_GET['id'];

    $EstEliminar = EliminarEstudiante($Estudiante, 'id', $studentID);
        
    unset($Estudiante[$EstEliminar]);

    $_SESSION['student'] = $Estudiante;
    
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminado</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

    <div class="col-md-10"></div>
    <div class="col-md-5">
    <div class="card" style="width: 18rem;">
    <div class="card-header">
     <?php echo 'este estudiante se ha eliminado'; ?>
    </div>
    <div style=" margin-top: 3%;" class="col-md-9">
    <a href="Registro.php" class="btn btn-dark text-light">Registrar estudiante</a>
    <a style="margin-bottom:3%;" href="get.php" class="btn btn-danger text-light">Eliminar estudiante</a>
    </div>
    
    </div>
    </div>



    
</body>
</html>
