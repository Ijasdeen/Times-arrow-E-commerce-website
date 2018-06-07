<?php
 $server='localhost';
 $userName='root';
$password=''; 
$database='Ecommerce2';
 
$connection=mysqli_connect($server,$userName,$password,$database);
if(!$connection){
   echo 'Connection lost';
    die();
    
}
  
?>