<?php
   require_once 'app/config.php'; 
    //session_destroy();

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Cotizacion</title> 
     
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="bg-light"> 
    <div class="container-fluid py-5">
        <div class="row mb-5">
          <div class="col-xl-12">
          <center><h1>COTIZADOR</h1></center>

          </div>
        </div>
    </div>       
      <div class="row">
          <div class="col-xl-4"> 
              <div class="card">
                  <div class="card-body">  
                <input name="" id="prueba" class="btn btn-primary" type="button" value="prueba">
                  <h4>agregar producto</h4>
                  <form action="" id="agregar_concepto">
                 <div class="form-group row"> 
                     <div class="col-xl-5"> 
                     <label for="concepto">concepto</label> 
                     <input type="text" class="form-control" id="concepto" placeholder="Escribe un concepto" required> 
                     </div> 
                     
                     <div class="col-xl-4"> 
                        <label for="concepto">precio uni</label> 
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div> 
                            <input type="text" class="form-control" id="precio_uni" placeholder="0" min="0" required> 
                        </div> 
                  
                        
                     </div> 

                     <div class="col-xl-3">
                     <label for="concepto">cantidad</label> 
                     <input type="number" min="0" class="form-control " id="cantidad" placeholder="0" required> 
                     </div>

                 </div> 
                 <div class="input-group">
                           <button class="btn btn-primary" type="submit" id="agregar">Agregar producto</button>
                           <button class="btn btn-danger" type="reset">Cancelar</button>
                        </div>
             </form>
                  </div>
              </div> 
           
           
          </div>  
            <!--cargar cotizacion -->
          <div class="col-xl-8" id="cotizacion"> 
              <!--cargar cotizacion -->  
          </div>
      </div>
  </div>





   





    
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->    
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
</html>


