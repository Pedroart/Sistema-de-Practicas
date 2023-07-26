<?php //echo json_encode($relleno); ?>
<div class="container-fluid text-center">
  
<div class="row">
    <div class="col-md-3">
        <a href="<?= _URL_ ?>/procesos/<?=$data["procesos_id"]?>/Estado" class="btn btn-primary btn-block mb-4"><b>Estado</b></a>

        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <button onclick="aceptar()" class="btn btn-success btn-block"><b>Aceptar</b></button>
                <button onclick="revisar()" class="btn btn-warning btn-block"><b>Revisar</b></button>
            </div>
            <div class="card-footer">
            
            <textarea class="form-control" id="comentarioPrincipal"; type="text" placeholder="Ingrese Comentario" cols="30" rows="10"></textarea>
            </div>
        </div>
                

    </div>
    <div class="col-md">
    <?php include _view_ . "/procesos/generador.php";?>
    </div>
</div>

<script>
        function aceptar() {
            fetch('<?= _URL_ ?>/procesos/aceptado/<?= $data["procesos_id"] ?>', {
                    method: 'POST',
                })
                .then(response => {
                    window.location.href = '<?= _URL_ ?>/procesos';
                })
                .catch(error => {
                    // Manejar el error aquí
                    console.error('Error en la llamada POST:', error);
                });
        }

        function revisar(){
            var datos = new FormData();
            datos.append("comentario_principal", document.getElementById('comentarioPrincipal').value );
            fetch('<?= _URL_ ?>/procesos/revisar/<?= $data["procesos_id"] ?>', {
                    method: 'POST',
                    body: datos
                })
                .then(response => {
                    window.location.href = '<?= _URL_ ?>/procesos';
                })
                .catch(error => {
                    // Manejar el error aquí
                    console.error('Error en la llamada POST:', error);
                });
        }
</script>