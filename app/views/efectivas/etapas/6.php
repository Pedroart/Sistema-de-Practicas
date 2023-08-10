<?php
$estado = ($actual>$activo)? "3":$dataProceso["procesos_estado"];
?>
<div class="container-fluid text-center">
    <?php
    include _view_ . "/efectivas/submenu.php";
    ?>



    <h2 class="h2 mb-2 text-gray-800">Informe Final</h2>
    <p class="mb-4">
    Usted tiene un plazo máximo de 15 días a partir de la culminación de sus prácticas para subir los siguientes documentos. Caso contrario se declarará en abandonó el proceso sin lugar a reclamo.
    
    </p>
    <div class="row justify-content-md-center">
        <div class="col-lg-6">
            <div class="callout callout-danger">
            <h5>Informe Final</h5>
            <p>
            La presentación de todo Informe que exceda los quince (15) días calendario de haber culminado el proceso de prácticas, se declarará en abandono sin lugar a reclamo. Este documento debe estar firmado y sellado por tu jefe inmediato.
            </div>
            
        </div>
        <div class="col-lg-6">
        <div class="callout callout-danger">
            <h5>Constancia de Practicas</h5>
            <p>
            Es un documento otorgado por la empresa debidamente firmado y sellado en donde debe figurar los datos del practicante, la fecha de inicio y culminación de sus prácticas. Debe escanear y subir este documento al sistema en formato PDF.</p>
            </div>
            </div>
    </div>

    <?php include _view_ . "/efectivas/cabecera.php";?>
    <?php include _view_ . "/efectivas/generador.php";?>
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
      
      fetch('http://practicas.test/efectivas/proceso', {
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