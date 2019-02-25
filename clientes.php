<?php 

session_start();
$var=$_SESSION['admin'];
if ($var==null || $var = '')
{
  echo '<script language="javascript">';
  echo 'alert("Inicie Sesión")';
  echo '</script>';
  print "<script>window.location='index.php';</script>";    
  die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <script type="text/javascript" src="js/jquery.js"></script>
    <title>Lavame</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</head>
<body>
  <?php 

  include 'navbar.php';
  ?>
    <div class="container" >
    <div class="card mt-2" style="width: 18rem; width: 100%;">
  <div class="card-body">
    <h5 class="card-title">Registro de Clientes</h5>
    <form action="autos.php" method="POST">
 <!--INPUT RUN-->
                <div class="input-group mb-3">
            <div class="input-group-prepend">
                <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
            </div>
            <input type="text" class="form-control" name="run" placeholder="RUN" aria-label="RUN" maxlength="10" aria-describedby="basic-addon1" required>
            </div>
    <!--INPUT NOMBRE COMPLETO-->
    <div class="input-group mb-3">
            <div class="input-group-prepend">
                <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
            </div>
            <input type="text" class="form-control" name="nombre_completo" placeholder="Nombre Completo" aria-describedby="basic-addon1" required>
            </div>  
    <!--INPUT TELEFONO -->
    <div class="input-group mb-3">
            <div class="input-group-prepend">
                <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
            </div>
            <input type="text" class="form-control" name="telefono" placeholder="Teléfono (Ej : 918283762)" maxlength="9" aria-describedby="basic-addon1" required>
            </div>  
    
                                    
     <input type="submit" class="btn btn-raised btn-primary" value="Siguiente">              
    </form>
  </div>
</div>
    </div>
 <script src="js/jquery.rut.js"></script>
 <!--VALIDAR RUT -->
     <script type="text/javascript">
      $(function() {
        $("#rut").rut({formatOn: 'keyup', 
        validateOn: 'keyup'
        }).on('rutInvalido', 
        function(){
            rut.setCustomValidity("RUT Inválido");
            $(".form-rut").addClass("has-danger")
            $(".input-rut").addClass("form-control-danger")  
        }).on('rutValido', 
        function(){ 
            $(".form-rut").removeClass("has-danger")
            $(".form-rut").addClass("has-success")
            $(".input-rut").removeClass("form-control-danger")
            $(".input-rut").addClass("form-control-success")
            rut.setCustomValidity('')
        });
      });
            $('#nom').on('input', function() {
                var value = $(this).val();
                if(value.length >= 5){
                    $(".form-nom").removeClass("has-danger")
                    $(".form-nom").addClass("has-success")
                    $(".input-nom").removeClass("form-control-danger")
                    $(".input-nom").addClass("form-control-success")
                    nom.setCustomValidity('')
                }
                if(value.length >= 0 && value.length < 5){
                    nom.setCustomValidity("El Nombre debe tener mas de 5 caracteres");
                    $(".form-nom").addClass("has-danger")
                    $(".input-nom").addClass("form-control-danger")    
                }
        });
    </script>   
</body>
</html>

<!--Nicolas Cisterna-->