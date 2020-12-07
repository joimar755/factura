<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Inserta algún título </title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <link href="css/jquery.dataTables.min.css" rel="stylesheet">
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
      error_reporting(0);
      $d = new Data();
      $productos = $d->getProductos();
      $cont = 0;
      foreach ($productos as $p) {
        echo "<tr>";
        echo "<td>.$p->id.</td>";
        echo "<td>.$p->nombre.</td>";
        echo "<td>.$p->precio.</td>";
        echo "<td>.$p->stock.</td>";
        echo "<td>";
        //echo "<form action='controller/agregar.php' method='post' id='formulario'>";
        echo "<form   method='POST' id='formulario'>";
        echo "<input type='hidden' name='txtID" . $cont . "'      id='id" . $cont . "' value='" . $p->id . "'>";
        echo "<input type='hidden' name='txtnombre" . $cont . "'   id='nombre" . $cont . "'   value='" . $p->nombre . "'>";
        echo "<input type='hidden' name='txtprecio" . $cont . "'   id='precio" . $cont . "'  value='" . $p->precio . "'>";
        echo "<input type='hidden' name='txtstock" . $cont . "'       id='stock" . $cont . "'  value='" . $p->stock . "'>";
        echo "<input type='number' name='txtcantidad" . $cont . "'     id='cantidad" . $cont . "'   step='0.1' min='0' >";
        echo "<button  type='button' id='btn_generar" . $cont . "'   onclick='agregar(" . $cont . ")'   class='btn btn-primary'> Añadir </button>";
        echo "<a href=''><input type='button' name='btneditar' id='' value='editar' ></a>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
     }
     $cont++;
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
