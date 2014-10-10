<?php
$host     = "localhost";
$user     = "root";
$password = "kato93";
$db       = "iac";

$conn = mysqli_connect($host,$user,$password,$db);
if (mysqli_connect_errno($conn)) {
    echo "Erro de conexão com o MySQL: " . mysqli_connect_error();
}



?>