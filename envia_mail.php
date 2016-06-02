<?php 
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
   else{
   
   $sql = "SELECT * FROM datos where variable='N'";
   $result = $conn->query($sql);
   $id ="";
   $nombre ="";
   if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
           echo "id: " . $row["id"]. " - nombre: " . $row["nombre"]. " " . $row["correo"]. "<br>";
   		$id=$row["id"];
   		$nombre= $row["nombre"];
   		$correo=$row["correo"];
   		
   		
   		
   		$qry = "UPDATE datos SET variable='S' WHERE id='$id'";
   
   
   
   if ($conn->query($qry) === TRUE) {
   	
   	echo $nombre;
   	echo $correo;
   	
   
   $subject = 'PROJECT CRON';
   $message = 'Hola '.$nombre.' este correo fue enviado por un cron de forma autonoma, si deseas recibir otro ingresa tus datos en el sitio: http://goo.gl/SFCQkk';
   $headers = 'From: cron@cron.com' . "\r\n" .
       'Reply-To: cron@cron.com' . "\r\n" .
       'X-Mailer: PHP/' . phpversion();
   
   mail($correo, $subject, $message, $headers);
   	
   }
   else{
   	
   	 echo "Error updating record: " . $conn->error;
   }
   
   
       }
   } else {
       echo "0 results";
   }
   
   
   }
   $conn->close();
   
   ?>
