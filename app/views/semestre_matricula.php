<div class="container">
<div class="row">
<div class="col-12 mb-4">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Usuario</h5>
      <h6 class="card-subtitle mb-2 text-muted">Fecha y hora del comentario</h6>
      <p class="card-text">Contenido del comentario</p>
    </div>
  </div>
</div>

<div class="col-12">  
  <form id="formMatricula">
      <div class="form-group" >
        <label for="semestre">ID Semestre:</label>
        <input type="text" class="form-control" id="semestre" name="semestre" required>
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
