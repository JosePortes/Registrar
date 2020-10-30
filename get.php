<?php

include './utilities.php';
 session_start();
 $_SESSION['student'] = isset($_SESSION['student']) ? $_SESSION['student'] : array();
 
$ListaEstudiantes = $_SESSION['student'];

if(!empty($ListaEstudiantes)){
    if(isset($_GET['CarreraItlaId'])){
        $ListaEstudiantes = BuscarCarrera($ListaEstudiantes, 'carrera', $_GET['CarreraItlaId']);
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<a href="./Registro.php" class="btn btn-success">Registrar estudiante</a>
<br><br>

<div style="margin-bottom: 1%;" class="row">
        <div class="col-md-10"></div>
        <div class="col-md-5">
        
          <div class="btn-group">

                <a href="get.php" class="btn btn-danger text-light">Todos</a>
                <a href="get.php?CarreraItlaId=1" class="btn btn-danger text-light">Software</a>
                <a href="get.php?CarreraItlaId=5" class="btn btn-danger text-light">Seguridad</a>
                <a href="get.php?CarreraItlaId=3" class="btn btn-danger text-light">Sonido</a>
                <a href="get.php?CarreraItlaId=4" class="btn btn-danger text-light">Multimedia</a>
                <a href="get.php?CarreraItlaId=2" class="btn btn-danger text-light">Redes</a>
                <a href="get.php?CarreraItlaId=6" class="btn btn-danger text-light">Mecatronica</a>
           
            
          </div>

        </div>
    </div>

<div class="row">

<?php if(!empty($ListaEstudiantes)) : ?>

    <?php foreach($ListaEstudiantes as $Est) : ?>
   

   <div class="col-md-4">
   <div class="card" style="width: 18rem;">
       <div class="card-body">
           <h6 class="card-title"><?php echo 'Nombre: ' , $Est['nombre']; ?></h6>
           <h6 class="card-title"><?php echo 'Apellido: ' , $Est['apellido']; ?></h6>
           <h6 class="card-title"><?php echo 'Carrera: ' , Nombre($Est['carrera']); ?></h6>
           <h6 class="card-title"><?php echo 'Estado: ' , $Est['estado']; ?></h6>
           <a href="eliminar.php?id=<?php echo $Est['id']; ?>" class="btn btn-danger card-link">Eliminar</a>
           <a href="Editar.php?id=<?php echo $Est['id'];?>" class="btn btn-warning card-link">Editar</a>
       </div>
   </div>
   </div>


<?php endforeach ?>
    
   

<?php else : ?>

    <h1>No hay registro de ningun estudiante</h1>


<?php endif; ?>
   
</div>
</div>
</body>
</html>