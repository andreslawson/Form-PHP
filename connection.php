<?php
# http://localhost:8080/connection.php
define("host","localhost");
define("user","root");
define("psw","");
define("db","escola");
define("msg", "Database error connection");

$connect = mysqli_connect(host, user, psw, db) or die(msg);
?>