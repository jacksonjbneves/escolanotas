<?php  
$host1="localhost";
//$host1="localhost:3306";
$db="db_monaco";
//$db="jacks804_jdev_db";
$username = "root";
//$username = "jacks804_jackson";
$password = "";
//$password = "78qw45as12zx";

try {
  $conn = new PDO("mysql:host=$host1; dbname=$db", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Entrou no banco!";
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>