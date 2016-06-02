<!--
   CURSO:       DISEÑO DE SISTEMAS
   CATEDRATICO: CESAR HERNANDEZ
   AUTOR:       MARVIN GRIJALVA
   PROYECTO:    CRON
   -->
<!DOCTYPE HTML>
<html lang="en-us">
   <head>
      <LINK href="style.css" rel="stylesheet" type="text/css"/>
      <link href='https://fonts.googleapis.com/css?family=Fredericka+the+Great' rel='stylesheet' type='text/css'>
      <link rel="icon" href="img/clock.png" type="image/x-icon" />
      <title>.:Cron:.</title>
   </head>
   <body class="cbody">
      <Center>
         <p class="titulo">Proyecto CRON</p>
      </center>
      <div class="cdiv">
         <br/><br/>
         <center>
         <form action="index.php" method ="post"  class="form-container cdiv">
            <div class="form-title">
               <p>Ingresa tus datos</p>
            </div>
            <div class="form-title">
               <p>Nombre</p>
            </div>
            <input class="form-field" type="text" name="firstname" required/><br />
            <div class="form-title">
               <p>em@il</p>
            </div>
            <input class="form-field" type="email" name="email" required/><br />
            <div class="submit-container">
               <input class="submit-button" type="submit" value="Enviar" />
            </div>
         </form>
         <center/>
         <br/><br/>
         <center>
            <a href="https://apps.umg.edu.gt/" target="_blank"><img src="img/umgw.png" target="_blank" widht="100px" height="100px" onmouseover="this.src='img/umgb.png'" onmouseout="this.src='img/umgw.png'" border="0" alt=""/></a>
            <a href="https://github.com/" target="_blank"><img src="img/gitw.png" target="_blank" widht="100px" height="100px" onmouseover="this.src='img/gitb.png'" onmouseout="this.src='img/gitw.png'" border="0" alt=""/></a>
            <a href="https://www.000webhost.com/" target="_blank"><img src="img/whw.png" widht="100px" height="100px" onmouseover="this.src='img/whb.png'" onmouseout="this.src='img/whw.png'" border="0" alt=""/></a>
            <a href="https://cron-job.org/en/" target="_blank"><img src="img/cronw.png" target="_blank" widht="100px" height="100px" onmouseover="this.src='img/cronb.png'" onmouseout="this.src='img/cronw.png'" border="0" alt=""/></a>
         </center>
      </div>
      </br></br>
      <br/><br/>
   </body>
</html>
<?php 
   try {
    $nombre=$_POST['firstname'];
    $correo=$_POST['email'];
    
   } catch (Exception $e) {
    $nombre="";
   }
   
   if($nombre!=""){
    
    
   $servername = 'mysql7.000webhost.com';
   $username = 'a7410945_demo';
   $password = 'unodostres123';
   $database   = "a7410945_correos";
   
   // Create connection
   $conn = new mysqli($servername, $username, $password,$database);
   
   // Check connection
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
   } 
   
   $sql = "INSERT INTO datos(id, nombre, correo, variable, fecha)
   VALUES (null,'$nombre','$correo','N',curdate())";
   
   if ($conn->query($sql) === TRUE) {
    
   
   echo '<script type="text/javascript">
   function PopupCenter(url, title, w, h) {
    // Fixes dual-screen position                         Most browsers      Firefox
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;
   
    var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;
   
    var left = ((width / 2) - (w / 2)) + dualScreenLeft;
    var top = ((height / 2) - (h / 2)) + dualScreenTop;
    var newWindow = window.open(url, title, "scrollbars=no, width=" + w + ", height=" + h + ", top=" + top + ", left=" + left);
   
    // Puts focus on the newWindow
    if (window.focus) {
        newWindow.focus();
    }
   }
   
   
   
    PopupCenter("popup.php","Hola :)","500","500");
    </script>';	
   } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
   }
   
   $conn->close();
    
    
    
   }
   
   ?>
