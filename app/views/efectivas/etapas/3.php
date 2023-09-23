<?php
$estado = ($actual>$activo)? "3":$dataProceso["procesos_estado"];
?>

<div class="container-fluid text-center">
    <?php
    include _view_ . "/efectivas/submenu.php";
    ?>

    <h1 class="h2 mb-2 text-gray-800">Datos del jefe inmediato</h1>
    <p class="mb-4">
        Rellena la ficha con los datos de tu jefe inmediato, los datos deben ser auténticos
        y verídicos de lo contrario no podrá continuar con los siguientes pasos.
    </p>

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