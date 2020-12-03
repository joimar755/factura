<?php
require_once "../model/data.php";
session_start(); 

$a = [];

$array = [ 

$carrito => $_SESSION["carrito"],
$total => $_SESSION["total"] 



];  

array_push($a, $array);

echo json_encode($a);
 
  
$d = new data();

$d->crearventa($carrito,$total);

session_unset($carrito);


session_unset($total);





 ?>
