<html>
<head>
<title> Intervencion </title>
<head>
<body>
  <?php
      session_start();
      include('php/acceso_db.php'); 
          if(isset($_POST['enviar'])) 
          {  
            $titulo =$_POST['titulo'];
            $texto = $_POST['texto'];
            $image = $_FILES['registro']['tmp_name'];
            $dataTime = date("Y-m-d");
            $tipo = $_POST['tipo'];

            $imgContent = addslashes(file_get_contents($image));


            $sql = "INSERT INTO obras(obra_titulo, obra_texto,obra_imagen,obra_fecha,obra_tipo) VALUES('$titulo', '$texto','$imgContent','$dataTime','$tipo')";
            
             $result = $conn->query($sql) ;  
          
          if($result) 
          {  
        ?>
           <h1>Tu aporte ha sido ingresado con exito</h1>     
        <?php  
          }
          else 
          {
        ?>
          <p>Error: No se pudo agregar el texto e imagen</p>

        <?php
          } 

          }
          else 
          {
            ?>



<center><h1>Publica la obra de arte que quieras</h1>
  
  <form action="<?=$_SERVER['PHP_SELF']?>" method="post"  enctype="multipart/form-data"/>
   <p>Titulo
    <input type="text" name="titulo" id="titulo" required>
    </p>    
    
    <p>Tipo de obra<p>
    <input type="radio" name="tipo"  value="II"><abbr title="Multimedial/Instalacion/Mapping/etc.">Artes Multimediales</abbr></input>
    <input type="radio" name="tipo" value="AM"><abbr title="Performance/teatro/actuacion/etc">Artes Escenicas</abbr></input>
    <input type="radio" name="tipo" value="AV"><abbr title="Pintura/Escultura/etc">Artes Visuales</abbr></input>
    <input type="radio" name="tipo" value="ES"><abbr title="Escritura/poesia/etc">Artes de la escritura</abbr></input>
    <input type="radio" name="tipo" value="MU"><abbr title="Musicales Sonoras">Artes Sonoras</abbr></input>
    <input type="radio" name="tipo" value="CI"><abbr title="Cortometraje/Cine/Cine experimental">Artes Audiovisuales</abbr></input>


<p>Descripcion de la obra</p>

  <textarea  cols=150 rows=20 maxlength=2000 name="texto" id="texto"></textarea>

    
   <p>Registro/foto/video/musica</p>
<input type="file" name="registro" id="registro"></input>
    
    
<br><br><input type=submit name="enviar" value="enviar"></input>
  </form>
</center>
<?php
  }
 ?>


</body>
</html>
