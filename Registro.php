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

if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['carrera'])){

  $_SESSION['student'] = isset($_SESSION['student']) ? $_SESSION['student'] : array();

  $student = $_SESSION['student'];
  $IDStudent = 1;

    if(!empty($student)){
    $LastOne = ObtenerUltimo($student);
    $IDStudent = $LastOne['id'] + 1;
     
   }  

  array_push($student,['id' => $IDStudent, 'nombre' => $_POST['nombre'], 'apellido' => $_POST['apellido'], 'carrera' => $_POST['carrera'], 'estado' => $_POST['estado']]);
  $_SESSION['student'] = $student;
  //var_dump($student);
}


?>

<form method= "POST">
<div class="card">
  <div class="bg-primary text-light text-align center; card-header">
    <a href="./get.php" class="btn btn-success">Lista de los estudiantes</a> Registro de estudiantes del ITLA
  </div>
  <div class="card-body">
   <form method="POST" >
  <div class="form-group">
    <label for="nombre">Nombres:</label>
    <input  class="form-control" name="nombre" id="nombre" required>
  </div>
  <div class="form-group">
    <label for="apellido">Apellidos:</label>
    <input class="form-control" name="apellido" id="apellido" required>
  </div>
  <div class="form-group">
    <label for="carrera">Elige una carrera</label>
    <select class="form-control" name="carrera" id="carrera" required>
      <?php foreach($carreras as $id => $ITLACAR): ?>

      <option value="<?php echo $id; ?>"> <?php echo $ITLACAR; ?></option>

      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group ">
  <div class="form-group">
  <label class="text-align: center; form-check-label" for="estado" >Estado:</label>
  </div>
    <input type="checkbox" class="form-group form-check-input" name="estado" id="estado" required>
    <label class="text-align: center; form-check-label" for="estado">Activo</label>
  </div>
  <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
 
    </br> </br>


    
</form>

  </div>
</div>




    
</body>
</html>