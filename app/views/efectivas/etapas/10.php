<?php
$estado = ($actual>$activo)? "3":$dataProceso["id_estado"];
$id_empresa = $dataProceso["id_empresa"];
$id_empresaAlumno = $dataProceso["id_empresaAlumno"];
?>
<div class="container-fluid text-center">
    <?php
    include _view_ . "/efectivas/submenu.php";
    ?>

    <h2 class="h2 mb-2 text-gray-800">Ficha de Actividades</h2>
    <p class="mb-4">
        Es un documento en donde se registran las posibles actividades a
        realizarse durante todo el periodo prácticas, el cual debe estar firmado y
        sellado por tu jefe inmediato y tu persona. Debe escanear y subir este
        documento al sistema en formato PDF.
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
            datos.append("id_proceso", <?= $id_ ?>);
            datos.append("etapa", <?= $actual ?>);
            datos.append("estado", <?= $estado ?>);
            datos.append("id_empresa",<?= $id_empresa ?>)
            datos.append("id_empresaAlumno",<?= $id_empresaAlumno?>)
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