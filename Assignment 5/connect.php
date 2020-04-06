<?php
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $pos = $_POST['pos'];
   $bdate = $_POST['bdate'];
   $Gender = $_POST['Gender'];
   $mail = $_POST['mail'];
   $phno = $_POST['phno'];

   //connecting a database to this shit...
   
   $conn = new mysqli('localhost', 'root', '', 'formdb');
   if($conn -> connect_error){
      die('Connection Failed  : '.$conn -> connect_error);
   }

   else{
      $stmt = $conn -> prepare("insert into registration(fname, lname, pos, bdate, nation, mail, phno) values(?, ?, ?, ?, ?, ?, ?)");
      $stmt -> bind_param("ssssssi", $fname, $lname, $pos, $bdate, $Gender, $mail, $phno);
      $stmt -> execute();
      echo "Registration Successful!";
      $stmt -> close();
      $conn -> close();
   }
?>