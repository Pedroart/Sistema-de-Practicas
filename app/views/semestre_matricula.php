<div class="container">
  <div class="row">

    <?php if ($matricula) : ?>
      <div class="col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">SISTEMA</h5>
            <p class="card-text">ESPERE VALIDACION DEL SISTEMA</p>
            <button id="put" class="btn btn-danger btn-block"><b>Reenviar</b></button>
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
            <embed src="<?= _URL_ ?><?= substr($data[0]["uri"], 7) ?>" height="500px" width="100%">
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
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
          <embed src="<?= _URL_ ?><?= substr($data[1]["uri"], 7) ?>" height="500px" width="100%">
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>

      </div>


    <?php else : ?>

      <div class="col-12">
        <form id="formMatricula">
          <div class="form-group">
            <label for="semestre">Semestre:</label>
            <input type="text" class="form-control" id="semestre" name="semestre" placeholder="<?= $Semestre  ?>" disabled>
          </div>
          <div class="form-group">
            <label for="ficha_matricula">Ficha de Matrícula:</label>
            <input type="file" class="form-control-file" id="ficha_matricula" name="ficha_matricula" accept=".pdf" required>
          </div>
          <div class="form-group">
            <label for="RecordAcademico">Record Académico:</label>
            <input type="file" class="form-control-file" id="RecordAcademico" name="RecordAcademico" accept=".pdf" required>
          </div>
          <button id="matricula" type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
  </div>
</div>

<?php endif ?>

<script>
  var b_matricula = document.getElementById('formMatricula');

  if (b_matricula) {
    b_matricula.addEventListener('submit', function(e) {
      e.preventDefault();
      var datos = new FormData(e.target);

      console.log(datos);
      fetch('http://practicas.test/validacion', {
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

  var b_put = document.getElementById('put');
  if (b_put){
    b_put.addEventListener('click', function(e) {
      fetch('http://practicas.test/validacion/put', {
          method: 'POST'
        });
        location.reload();
    });
  }

</script>