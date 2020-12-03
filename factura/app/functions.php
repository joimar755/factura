<?php
 

function json_output($json = [] ){
  header('Content-Type: application/json'); 
  echo json_encode($json);
  die;
}

function json_build($status = 200, $msg = 'ok', $data = []){
    return [
       'status' => $status,
       'msg' => $msg,
       'data' => $data
    ];
}


 function cargar_productos(){
       if (!isset($_SESSION['conceptos'])) {
          return [];
       }  
       
       return $_SESSION['conceptos'];

 }
 
 
 function cargar_p($id){ 
   $conceptos = cargar_productos();
   if (empty($conceptos)) return false; 
   
   foreach ($conceptos as $i => $v) {
      if ($v['id'] == $id) { 
         return $v;
      }
   }
   return false;
 }





 
?> 


