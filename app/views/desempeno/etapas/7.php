<?php
$estado = ($actual>$activo)? "3":$dataProceso["procesos_estado"];
?>

<div class="container-fluid text-center">
    <?php include _view_ . "/desempeno/submenu.php";?>

    <h1 class="h2 mb-2 text-gray-800">FICHA DE DATOS</h1>
    <p class="mb-4">
      Rellena la ficha con tus datos personales, estos det*n ser auténticos y verídicos de 10 contrario tener
  inconvenientes el
    </p>
    <?php include _view_ . "/desempeno/cabecera.php";?>
    <?php include _view_ . "/desempeno/generador.php";?>



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
  if(anular){
    anular.addEventListener('submit', function(e) {
      
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