<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>

<?php 

include 'utilities.php';
session_start();

if(isset($_GET['id'])){

  $EstId = $_GET['id'];

  $_SESSION['student'] = isset($_SESSION['student']) ? $_SESSION['student'] : array();

  $student = $_SESSION['student'];

  $Stu = BuscarCarrera($student, 'id', $EstId)[0];

  $Estudiante = ObtenerUltimo($student, 'id', $EstId);
  
    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['carrera'])){

      $ModifyEstudiante = [ 'id' => $EstId, 'nombre' => $_POST['nombre'], 'apellido' => $_POST['apellido'], 'carrera' => $_POST['carrera'], 'estado' => $_POST['estado'] ];
      
      $student[$Estudiante] = $ModifyEstudiante;

      $_SESSION['student'] = $student;
      
  }
}else{
  exit();
}




?>

<form action="Editar.php?id=<?php echo $Stu['id'] ?>" method= "POST">
<div class="card">
  <div class="bg-primary text-light text-align center; card-header">
    <a href="./get.php" class="btn btn-success">Lista de los estudiantes</a> Registro de estudiantes del ITLA
  </div>
  <div class="card-body">
   <form method="POST" >
  <div class="form-group">
    <label for="nombre">Nombres:</label>
    <input  class="form-control" value="<?php echo $Stu['nombre'] ?>" name="nombre" id="nombre" required>
  </div>
  <div class="form-group">
    <label for="apellido">Apellidos:</label>
    <input class="form-control" value="<?php echo $Stu['apellido'] ?>" name="apellido" id="apellido" required>
  </div>
  <div class="form-group">
    <label for="carrera">Elige una carrera</label>
    <select class="form-control" name="carrera" id="carrera" required>
      <?php foreach($carreras as $id => $ITLACAR): ?>
        <?php if($id == $Stu['carrera']): ?>

          <option selected value="<?php echo $id; ?>"> <?php echo $ITLACAR; ?></option>

        <?php else : ?>

          <option value="<?php echo $id; ?>"> <?php echo $ITLACAR; ?></option>

        <?php endif; ?>

      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group ">
  <div class="form-group">
  <label class="text-align: center; form-check-label" for="estado" >Estado:</label>
  </div style="text-align: right;">
    <input type="checkbox" value="<?php echo $Stu['estado'] ?>" class="form-group form-check-input" name="estado" id="estado" >
    <label class="text-align: center; form-check-label" for="estado">Activo</label>
  </div>
    
  <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
 
  </form>

  </div>
</div>

</body>
</html>