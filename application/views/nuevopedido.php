<!DOCTYPE html>
<html lang="en">
<head>
<?php include("incluidos/head.php");?>
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php include("incluidos/menu.php");?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
    <?php include("incluidos/nav.php");?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
        <?php include("incluidos/heading.php");?>
        <?php include("incluidos/nuevopedido.php");?>
        </div>
       <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
    <?php include("incluidos/footer.php");?>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
   <?php include("incluidos/logout.php");?>
  <?php include("incluidos/js.php");?>
</body>
</html>
<script type="text/javascript">
  
  function calcular(id) {

    // capturar los valores de los campos;
    // valor, impuestos, cantidad y aplicarle la formula para encontrar el subtotal 
    // y colocarlo en la casilla correspondiente
    var valor=$("#valor_"+id).val();
    var impuesto=$("#impuesto_"+id).val();
    var cantidad=$("#cantidad_"+id).val();

    var valorimpuesto=valor*(impuesto/100);

    subtotal=eval(cantidad)*(eval(valorimpuesto)+eval(valor));

    $("#subtotal_"+id).val(subtotal);

  }

  // para los procesos de agregar, quitar y fiinalzar usaremos ajax con jquery

  function agregar(param) {
    // capturar los valores que se deben pasar en el ajax
    var valor=$("#valor_"+param).val();
    var impuesto=$("#impuesto_"+param).val();
    var cantidad=$("#cantidad_"+param).val();
    var referencia=$("#referencia_"+param).val();
    var token=$("#token").val();
    var subtotal=$("#subtotal_"+param).val();

    // parametroe se debe pasar como un array
    // ruta se puede extraer del action del formulario
    // parametros se recomiendda usar los campos de la tabla para reducir
    // los errores
    parametros = {

      "ref" : referencia,
      "precio": valor,
      "impuestos": impuesto,
      "cantidad":cantidad,
      "subtotal": subtotal,
      "token": token

    }
    ruta = $("#frmpedidos").attr("action");
    
    // nvocar el metodo ajax
    $.ajax({

      data : parametros,
      url : ruta,
      type : "POST",
      beforesend: function () {
          $("#mensaje_"+param).html("<span class='btn btn-warning'>Cargando datos..</span>");
      },
      success: function(respuesta) { 


        //Si la respuesta es correcta:
        //1. Activar la capa de mensaje por casa fila.
        $("#mensaje_"+param).show();
        //2. Colocar un mensaje que indica el proceso es efectivo.
        $("#mensaje_"+param).html("<span class='btn btn-success'>Realizado</span>");
        //3. Darle 2 segundos a ésta capa y desvanecerla.
        $("#mensaje_"+param).fadeOut(2000);
        //4. En la capa valor_pedido colocar la respuesta pero formateada.
        var x = Number(respuesta).toLocaleString();
        $("#valor_pedido").html(x);

      },

      error: function(jqXHR,textStatus,errorThrown) {
          $("#mensaje_"+param).html("<span class='btn btn-danger'>Ocurre un error: "+textStatus+" "+errorThrown+"..</span>");
      }

    });


  }

  function eliminar(param) {
    // capturar los valores que se deben pasar en el ajax
    var valor=$("#valor_"+param).val();
    var impuesto=$("#impuesto_"+param).val();
    var cantidad=$("#cantidad_"+param).val();
    var referencia=$("#referencia_"+param).val();
    var token=$("#token").val();
    var subtotal=$("#subtotal_"+param).val();

    // parametroe se debe pasar como un array
    // ruta se puede extraer del action del formulario
    // parametros se recomiendda usar los campos de la tabla para reducir
    // los errores
    parametros = {

      "ref" : referencia,
      "precio": valor,
      "impuestos": impuesto,
      "cantidad":cantidad,
      "subtotal": subtotal,
      "token": token

    }
    ruta = $("#frmpedidos").attr("action");

    //Usar funcion replace para cambiar agregar por eliminar.
    ruta=ruta.replace("agregar","eliminar");
    
    // Invocar el metodo ajax
    $.ajax({

      data : parametros,
      url : ruta,
      type : "POST",
      beforesend: function () {
          $("#mensaje_"+param).html("<span class='btn btn-warning'>Cargando datos..</span>");
      },
      success: function(respuesta) { 


        //Si la respuesta es correcta:
        //1. Activar la capa de mensaje por casa fila.
        $("#mensaje_"+param).show();
        //2. Colocar un mensaje que indica el proceso es efectivo.
        $("#mensaje_"+param).html("<span class='btn btn-success'>Realizado</span>");
        //3. Darle 2 segundos a ésta capa y desvanecerla.
        $("#mensaje_"+param).fadeOut(2000);
        //4. En la capa valor_pedido colocar la respuesta pero formateada.
        var x = Number(respuesta).toLocaleString();
        $("#valor_pedido").html(x);
        //5. Limpiar los valores de cantidad y subtotal.
        $("#subtotal_"+param).val('');
        $("#cantidad_"+param).val('');

      },

      error: function(jqXHR,textStatus,errorThrown) {
          $("#mensaje_"+param).html("<span class='btn btn-danger'>Ocurre un error: "+textStatus+" "+errorThrown+"..</span>");
      }

    });


  }

  //Proceso de finalización de pedido.
  $("#frmpedidos").submit(function(evento){
    evento.preventDefault();
    //Pasar todos los parámetros y los convierte en un array.

    parametros=$("#frmpedidos").attr("action");
    //Capturar la ruta.
    ruta=ruta.replace("agregar","fiinalzar");
    //Invocar el ajax.
    $.ajax({
      data:parametros,
      url: ruta,
      type:"POST",

      beforesend: function(){
        $("pedido_mensaje").html("<span class='btn btn-warning'> Cargando datos..</span>");
      },

      success: function(respuesta){
        $("#pedido_mensaje").show();
        if(respuesta==0){
          $("#pedido_mensaje").html("<span class='btn btn-warning'> El pedido no se pudo guardar</span>");
        }else{
          ruta=ruta.replace("fiinalzar","listado");
          location.href=ruta;
        }

      },

      error: function(jqXHR,textStatus,errorThrown) {
          $("#pedido_mensaje"+param).html("<span class='btn btn-danger'>Ocurre un error: "+textStatus+" "+errorThrown+"..</span>");

    });


  });

</script>
