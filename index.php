<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Inserta algún título </title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <link href="css/jquery.dataTables.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
 
  <script>
    $(document).ready(function() {
      /* ..:: DataTable ::.. */
      $('#mitabla').DataTable({
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"  //Configuración a Español
        }
      });

      /*..:: BTN Enviar ::.. */
      $("#enviar").click(function() {
        var libras = $("#libra").val();
        var gramos = $("#gramos").val();

        $.post("peso.php", {
          libra: libras,
          gramos: gramos
        }, function(data) {
          $("#resultado").html(data);
        });
      });

    });
  </script>
</head>
<body style="padding-left:30px; padding-right:30px;">
  <h1> listado de productos</h1>
  <div>
    <a href="factura/cotizar.php"><button class="btn btn-primary">COTIZACION</button></a>
    <a href="reporte.php"><button class="btn btn-primary">INFORME VENTA</button></a>
    <a href="pdf1.php"><button class="btn btn-primary">DETALLE VENTA</button></a>
  </div>

  <div style="margin-top:15px;">
    <div class="col">
      <label> precio libra</label> <input type="text" name="libra" id="libra" required> </br>
    </div>
    <div class="col" style="margin-top:5px;">
      <label>gramos</label> <input type="text" name="gramos" id="gramos" required> </br>
    </div>
    <div class="col" style="margin-top:5px";>
      <input type="submit" name="calcular" value="calcular" id="enviar" class="btn btn-success">
    </div>
    <div id="resultado">

    </div>
  </div>


  <table border="1" class="table table-striped" id="mitabla"></br>
    <thead>
      <th>ID</th>
      <th>nombre</th>
      <th>precio</th>
      <th>stock</th>
      <th>añadir a venta</th>
    </thead>
    <tbody>
    <?php
      require_once "model/data.php";
      // error_reporting(0);
      $d = new Data();
      $productos = $d->getProductos();
      $cont = 0;
      $cuerpo_tabla = "";
      foreach ($productos as &$p) {
        //echo "<form action='controller/agregar.php' method='post' id='formulario'>";
        $cuerpo_tabla .= "\t\t<tr>\n".
                            "\t\t\t<td>$p->id</td>\n".
                            "\t\t\t<td>$p->nombre</td>\n".
                            "\t\t\t<td>$p->precio</td>\n".
                            "\t\t\t<td>$p->stock</td>\n".
                            "\t\t\t<td>\n".
                            "\t\t\t\t<form   method='POST' id='formulario'>\n".
                            "\t\t\t\t<input type='hidden' name='txtID" . $cont . "'      id='id" . $cont . "' value='" . $p->id . "'>\n".
                            "\t\t\t\t<input type='hidden' name='txtnombre" . $cont . "'   id='nombre" . $cont . "'   value='" . $p->nombre . "'>\n".
                            "\t\t\t\t<input type='hidden' name='txtprecio" . $cont . "'   id='precio" . $cont . "'  value='" . $p->precio . "'>\n".
                            "\t\t\t\t<input type='hidden' name='txtstock" . $cont . "'       id='stock" . $cont . "'  value='" . $p->stock . "'>\n".
                            "\t\t\t\t<input type='number' name='txtcantidad" . $cont . "'     id='cantidad" . $cont . "'   step='0.1' min='0' >\n".
                            "\t\t\t\t<button  type='button' " . $cont . "'   onclick='agregar(" . $cont . ")'   class='btn btn-primary'> <i class='fas fa-plus'></i> Añadir </button>\n".
                            "\t\t\t\t<a href=''><input type='button' name='btneditar' id='' value='editar' ></a>\n".
                            "\t\t\t\t</form>\n".
                            "\t\t\t</td>\n".
                            "\t\t</tr>\n\n";
        $cont++;
     }
     echo $cuerpo_tabla;
    ?>
    </tbody>
  </table>

  <!-- ..:: Listado de Ventas ::.. -->
  <a href="vista/ventas.php">listado de ventas</a>
  <?php
    $msg_agotado1 = "<script> alert('el producto esta agotado'); window.location= 'index.php'; </script>";
    $msg_agotado2 = "<script> alert('el producto esta agotado'); window.location= 'index.php'; </script>";

    if (isset($_GET["m"])) {
      $m = $_GET["m"];
      switch ($m) {
        case "1": echo $msg_agotado1;
                  break;
        case "2": echo $msg_agotado2;
                  break;
      }

    }

  ?>


<p id="contador" ></p>
  <h1>listado de compra</h1>
  <div>
    <table class="table table-dark">

      <tbody id="cuerpoTabla">
          
      </tbody>
     
    </table>
   
  </div>
</body>
<script src="agregar.js"></script>

</html>
