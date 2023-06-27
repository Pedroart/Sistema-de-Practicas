<?php
$estado = ($actual>$activo)? "3":$dataProceso["id_estado"];
$id_empresa = $dataProceso["id_empresa"];
$id_empresaAlumno = $dataProceso["id_empresaAlumno"];
?>
<div class="container-fluid text-center">
    <?php
    include _view_ . "/efectivas/submenu.php";
    ?>


    <h2 class="h2 mb-2 text-gray-800">Ficha de control Mensual</h2>
    <p class="mb-4">
    Es un documento en donde se registra todas las actividades realizadas cada mes,
    el cual debe estar firmado y sellado por tu jefe inmediato y tu persona.
    Debe escanear y subir este documento al sistema en formato PDF.
    </p>

    <?php include _view_ . "/efectivas/cabecera.php";?>
    <?php include _view_ . "/efectivas/generador.php";?>
</div>