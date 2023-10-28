<?php 
  
    $server   = "localhost";
    $username = "root";
    $password = "";
    $database = "portfolio-prognet";
  
    $connection = mysqli_connect($server, $username, $password, $database);
  
    if (!$connection) 
    {
        echo "<h1>connection Gagal</h1>";
    }
  
?>