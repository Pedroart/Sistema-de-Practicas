<?php
$estado = ($actual>$activo)? "3":$dataProceso["procesos_estado"];
?>
<div class="container-fluid text-center">
    <?php
    include _view_ . "/desempeno/submenu.php";
    ?>


    <h2 class="h2 mb-2 text-gray-800">Ficha de control Mensual</h2>
    <p class="mb-4">
    Es un documento en donde se registra todas las actividades realizadas cada mes,
    el cual debe estar firmado y sellado por tu jefe inmediato y tu persona.
    Debe escanear y subir este documento al sistema en formato PDF.
    </p>

    <?php include _view_ . "/desempeno/cabecera.php";?>
    <?php include _view_ . "/desempeno/generador.php";?>
</div>
<script>
    var b_FichaDatos = document.getElementById('idEtapa');
    if (b_FichaDatos) {
  b_FichaDatos.addEventListener('submit', function(e) {
      
      e.preventDefault();
      var datos = new FormData(e.target);
      datos.append("id_proceso",<?= $id_?>);
        datos.append("etapa",<?= $actual?>);
        datos.append("estado",<?= $estado?>);
      console.log(datos);
      
      fetch('<?= _URL_ ?>/desempeno/proceso', {
          method: 'POST',
          body: datos
        }).then(res => res.json())
        .then(data => {
          if (data.resultado === true) {
            location.reload();
            //console.log(data);
          } else {
            console.log(data);
          }
        }).catch((error)=>{
          console.log(error);
        });
        return 0;
    });
  }
</script>