<?php


include('conexion.php');

  $query = "SELECT * from producto";
  $result = mysqli_query($mysqli, $query);

 if (!$result) {
     die('ha fallado'. mysqli_error($mysqli));
 } 

  $json = array();
 while($row = mysqli_fetch_array($result)) {
     $json[] = array(
      'id' => $row['id'],
      'nombre' => $row['nombre'],
      'precio' => $row['precio'],
      'stock' => $row['stock'],
      'cantidad' => $row['cantidad']
     );

 }
   $jsonstring = json_encode($json);
    echo $jsonstring;

?>