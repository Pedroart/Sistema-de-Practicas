<div class="container">
<div class="row">

<?php if(!$matricula): ?>
<div class="col-12 mb-4">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">SISTEMA</h5>
      <p class="card-text">ESPERE VALIDACION DEL SISTEMA</p>
    </div>
  </div>
</div>
<?php endif ?>

<div class="col-12">  
  <form id="formMatricula">
      <div class="form-group" >
        <label for="semestre">Semestre:</label>
        <input type="text" class="form-control" id="semestre" name="semestre" placeholder="<?= $Semestre  ?>" disabled>
      </div>
      <div class="form-group">
        <label for="ficha_matricula">Ficha de Matrícula:</label>
        <input type="file" class="form-control-file" id="ficha_matricula" name="ficha_matricula" required>
      </div>
      <div class="form-group">
        <label for="RecordAcademico">Record Académico:</label>
        <input type="file" class="form-control-file" id="RecordAcademico" name="RecordAcademico" required>
      </div>
      <button id="matricula" type="submit" class="btn btn-primary">Enviar</button>
  </form>
</div>
</div>
</div>
