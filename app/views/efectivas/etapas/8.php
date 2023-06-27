<?php
$estado = ($actual>$activo)? "3":$dataProceso["id_estado"];
?>

<div class="container-fluid text-center">
    <?php
    include _view_ . "/efectivas/submenu.php";
    ?>

    <h2 class="h2 mb-2 text-gray-800">Carta de aceptación</h2>
    <p class="mb-4">
        Es un documento debidamente firmado y sellado, otorgado por la empresa donde menciona que
        ha sido aceptado para realizar sus prácticas pre profesionales, donde indica la fecha de inicio y
        culminación tus prácticas. Debe escanear y subir este documento al sistema en formato PDF.
    </p>

    <?php include _view_ . "/efectivas/cabecera.php";?>
    <?php include _view_ . "/efectivas/generador.php";?>
</div>
<script>
    var b_FichaDatos = document.getElementById('formFichaDatos');
    if (b_FichaDatos) {
    b_FichaDatos.addEventListener('submit', function(e) {
      e.preventDefault();
      var datos = new FormData(e.target);
      datos.append("id_proceso",<?= $id_?>);
        datos.append("etapa",<?= $actual?>);
        datos.append("estado",<?= $estado?>);
        datos.append("id_empresa_alumno",<?= $dataProceso["id_empresaAlumno"] ?>)
      console.log(datos);
      fetch('http://practicas.test/efectivas/proceso', {
          method: 'POST',
          body: datos
        }).then(res => res.json())
        .then(data => {
          if (data.resultado === true) {
            location.reload();
          } else {
            console.log(data);
          }
        })
    });
  }
</script>