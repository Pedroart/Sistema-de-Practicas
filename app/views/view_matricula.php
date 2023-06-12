

<div class="row">
    <div class="col-md-3">

        <div class="card card-primary card-outline">
            <div class="card-body box-profile">

                <h3 class="profile-username text-center">Nina Mcintire</h3>
                <p class="text-muted text-center">Software Engineer</p>

                <button onclick="aceptar()" class="btn btn-success btn-block"><b>Aceptar</b></button>
                <button onclick="revisar()" class="btn btn-warning btn-block"><b>Revisar</b></button>
                <button onclick="rechazar()" class="btn btn-danger btn-block"><b>Rechazar</b></button>
            </div>

        </div>

    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-text-width"></i>
                    Ficha de Matricula
                </h3>
            </div>

            <div class="card-body">
                <embed src="<?= _URL_ ?><?= substr($documentos[0]["uri"], 7) ?>" height="500px" width="100%">
            </div>
            <div class="card-footer">
            <input class="form-control" id="Ficha"; type="text" placeholder="Ingrese Comentario">
            </div>

        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-text-width"></i>
                    Record Academico
                </h3>
            </div>

            <div class="card-body">
            <embed src="<?= _URL_ ?><?= substr($documentos[1]["uri"], 7) ?>" height="500px" width="100%">
            </div>
            <div class="card-footer">
                <input class="form-control" id="record" type="text" placeholder="Ingrese Comentario">
            </div>
        </div>

    </div>
</div>

<script>
    function aceptar(){
        fetch('http://practicas.test/validaciones/aceptado/<?= $id ?>', {
        method: 'POST',
      })
      .then(response => {
        window.location.href ='<?= _URL_ ?>/validaciones';
      })
      .catch(error => {
        // Manejar el error aquí
        console.error('Error en la llamada POST:', error);
      });
    }
    function revisar(){

        var datos = new FormData();
        
        datos.append("Ficha",document.getElementById("Ficha").value);
        datos.append("record",document.getElementById("record").value);
        datos.append("idFicha",<?= $id_documentos[0] ?>);
        datos.append("idrecord",<?= $id_documentos[0] ?>);
        fetch('http://practicas.test/validaciones/revisar/<?= $id ?>', {
        method: 'POST',
        body: datos
      })
      .then(response => {
        alert(response);
        //window.location.href ='<?= _URL_ ?>/validaciones';
      })
      .catch(error => {
        // Manejar el error aquí
        console.error('Error en la llamada POST:', error);
      });
    }
    function rechazar(){
        fetch('http://practicas.test/validaciones/rechazar/<?= $id ?>', {
        method: 'POST',
      })
      .then(response => {
        window.location.href ='<?= _URL_ ?>/validaciones';
      })
      .catch(error => {
        // Manejar el error aquí
        console.error('Error en la llamada POST:', error);
      });
    }
</script>