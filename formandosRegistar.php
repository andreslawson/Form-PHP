<?php
#http://localhost:8080/atv01/formandosRegistar.php

// Connection file
require_once("connection.php");

//Variables 
$nome = $_GET['nome'];
$apelido = $_GET['apelido'];
$cidade = $_GET['cidade'];
$email = $_GET['email'];
$obs = $_GET['obs'];

//SQL query to check if the email exists
$sql = "SELECT id FROM formando WHERE email LIKE '$email'";
$query = mysqli_query($connect, $sql);
$total = mysqli_num_rows($query);

//Decision structure if email not exist register or send message
if ($total == 0) {
  $sql = "INSERT INTO formando (nome, apelido, cidade, email, obs) VALUES ('$nome', '$apelido', '$cidade','$email','$obs')";
  mysqli_query($connect, $sql) or die($sql);
  mysqli_close($connect);
  $path = "formandosRegistar.html?msg=OK";
} else {
  $path = "formandosRegistar.html?msg=repetido";
}

//Close Connection
mysqli_close($connect);
header("Location:$path");

?>
