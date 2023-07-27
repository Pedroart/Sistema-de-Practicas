<p class="mb-4">
            En este espacio podrás darle seguimiento a tu proceso de prácticas, recuerda
            que los pasas son secuenciales y no podrás avanzar el siguiente paso hasta que
            se te revise y apruebe el anterior. Así mismo podrás ver las observaciones
            realizadas y tendrá 7 días calendario como máximo para poder
            subsanarlo, para poder subsanar la observación deberá corregir el documento
            observado y subirlo al sistema, el archivo reemplazará al ya existente.
        </p>
        
        <?php
$estado = ($actual>$activo)? "3":$dataProceso["procesos_estado"];
?>

<div class="container-fluid text-center">
    
    <?php include _view_ . "/efectivas/generador.php";?>



</div>
