<?php
$estado = ($actual>$activo)? "3":$dataProceso["procesos_estado"];
?>

<div class="container-fluid text-center">
    <?php include _view_ . "/efectivas/submenu.php";?>

    <h1 class="h2 mb-2 text-gray-800">FICHA DE DATOS - carta de presentación</h1>
    <p class="mb-4">
        La carta de presentación es un documento formal a nombre de la Universidad
        dirigida a una empresa ofreciendo tus servicios de manera espontánea. Su
        función es presentarte e introducir brevemente tu candidatura.
    </p>
    <?php include _view_ . "/efectivas/cabecera.php";?>
    <?php include _view_ . "/efectivas/generador.php";?>



</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Aquí puedes llamar a la función que deseas ejecutar una vez que la página esté completamente cargada
        fillDepartamentosSelect("Departamento1");
        fillDepartamentosSelect("Departamento2");
    });

    document.getElementById('Departamento1').addEventListener('change', function() {
        const selectedDepartamento = this.value;
        fillProvinciaSelect(selectedDepartamento, "Provincia1");
    });

    document.getElementById('Provincia1').addEventListener('change', function() {
        const selectedProvincia = this.value;
        fillDistritoSelect(selectedProvincia, "Distrito1");
    });

    document.getElementById('Departamento2').addEventListener('change', function() {
        const selectedDepartamento = this.value;
        fillProvinciaSelect(selectedDepartamento, "Provincia2");
    });

    document.getElementById('Provincia2').addEventListener('change', function() {
        const selectedProvincia = this.value;
        fillDistritoSelect(selectedProvincia, "Distrito2");
    });

    var b_FichaDatos = document.getElementById('idEtapa');
    var anular = document.getElementById('borrar');
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
  if(anular){
    anular.addEventListener('submit', function(e) {
      
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