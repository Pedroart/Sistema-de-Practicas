<div class="container-fluid text-center">
    <?php
    include _view_ . "/desempeno/submenu.php";

    $modelo = new app\models\user();
    $Datos_usuari = $modelo->Datos_Alumno($_SESSION['id_user']);
    ?>

    <h1 class="h2 mb-2 text-gray-800">FICHA DE DATOS - carta de presentación</h1>
    <p class="mb-4">
        La carta de presentación es un documento formal a nombre de la Universidad
        dirigida a una empresa ofreciendo tus servicios de manera espontánea. Su
        función es presentarte e introducir brevemente tu candidatura.
    </p>
    <?php if($estado==3) :?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Respuesta del Sistema</h4>
        <p>Etapa Finalizada</p>
    </div>
    <?php elseif($estado==2) :?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Respuesta del Sistema</h4>
        <p>Datos cargados exitosamente</p>
    </div>
    <?php elseif($estado==1) :?>
    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Docente: Loren Ipsu</h4>
        <p>Datos Erroneos empresa no encontrada</p>
    </div>
    <?php endif; ?>
    <form id="formFichaDatos" name="formFichaDatos">
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        Datos Personales
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="staticName" class="col-sm-4 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control"  value="<?= $Datos_usuari['nombre'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticAparterno" class="col-sm-4 col-form-label">Apellido Parterno</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?= $Datos_usuari['apellido_paterno'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticAmarterno" class="col-sm-4 col-form-label">Apellido Marterno</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-user" name="estudiante_Amarterno" value="<?= $Datos_usuari['apellido_materno'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticDNI" class="col-sm-4 col-form-label">DNI</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control"  value="<?= $Datos_usuari['DNI'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticCiclo" class="col-sm-4 col-form-label">Ciclo</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?= $_SESSION['semestre'] ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        Datos del Estudiante
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="staticDirec" class="col-sm-4 col-form-label">Dirección</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="estudiante_Direc" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticCorreo1" class="col-sm-4 col-form-label">Correo 1</label>
                            <div class="col-sm-8">
                                <input type="mail" class="form-control" name="estudiante_Correo" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticCelular" class="col-sm-4 col-form-label">Celular</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="estudiante_Celular" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticDepartamento1" class="col-sm-4 col-form-label">Departamento</label>
                            <div class="col-sm-8">
                                <select id="staticDepartamento1" name="estudiante_Departamento" class="form-control" required>
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticProvincia1" class="col-sm-4 col-form-label">Provincia</label>
                            <div class="col-sm-8">
                                <select id="staticProvincia1" name="estudiante_Provincia" class="form-control" required>
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticDistrito1" class="col-sm-4 col-form-label">Distrito</label>
                            <div class="col-sm-8">
                                <select id="staticDistrito1" name="estudiante_Distrito" class="form-control" required>
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        Datos del Centro Laboral
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="staticRUC" class="col-sm-4 col-form-label">Numero de RUC de la Empresa</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="empresa_RUC" value="7" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticNombreEmpres" class="col-sm-4 col-form-label">Nombre de la Empresa*</label>
                            <div class="col-sm-8">
                                <input type="mail" class="form-control" name="empresa_NombreEmpres" value="Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticDirecLabo" class="col-sm-4 col-form-label">Dirección*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="empresa_DirecLabo" value="Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticDepartamento2" class="col-sm-4 col-form-label">Departamento</label>
                            <div class="col-sm-8">
                                <select id="staticDepartamento2" name="empresa_Departamento" class="form-control" required>
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticProvincia2" class="col-sm-4 col-form-label">Provincia</label>
                            <div class="col-sm-8">
                                <select id="staticProvincia2" name="empresa_Provincia2" class="form-control" required>
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticDistrito2" class="col-sm-4 col-form-label">Distrito</label>
                            <div class="col-sm-8">
                                <select id="staticDistrito2" name="empresa_Distrito2" class="form-control" required>
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        Datos del Representante de la Empresa
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="Genero" class="col-sm-4 col-form-label">Genero</label>
                            <div class="col-sm-8">
                                <select name="Genero" class="form-control" required>
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticNameRepre" class="col-sm-4 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="representante_Name" value="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticAparternorRepre" class="col-sm-4 col-form-label">Apellido Parterno</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="representante_Aparternor" value="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticAmarterno" class="col-sm-4 col-form-label">Apellido Marterno</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-user" name="representante_Amarterno" value="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="GradoInstruccion" class="col-sm-4 col-form-label">Grado de Instruccíon</label>
                            <div class="col-sm-8">
                                <select name="representante_GradoInstruccion" class="form-control" required>
                                    <option selected>Choose...</option>
                                    <option>Educación básica alternativa</option>
                                    <option>Educación básica especial</option>
                                    <option>Grado superior, técnicos profesionales</option>
                                    <option>Grado medio</option>
                                    <option>Grado elemental</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Cargo" class="col-sm-4 col-form-label">Cargo</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Cargo" value="Name" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button id="enviar" type="submit" class="btn btn-primary mb-5">Enviar</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Aquí puedes llamar a la función que deseas ejecutar una vez que la página esté completamente cargada
        fillDepartamentosSelect("staticDepartamento1");
        fillDepartamentosSelect("staticDepartamento2");
    });

    document.getElementById('staticDepartamento1').addEventListener('change', function() {
        const selectedDepartamento = this.value;
        fillProvinciaSelect(selectedDepartamento, "staticProvincia1");
    });

    document.getElementById('staticProvincia1').addEventListener('change', function() {
        const selectedProvincia = this.value;
        fillDistritoSelect(selectedProvincia, "staticDistrito1");
    });

    document.getElementById('staticDepartamento2').addEventListener('change', function() {
        const selectedDepartamento = this.value;
        fillProvinciaSelect(selectedDepartamento, "staticProvincia2");
    });

    document.getElementById('staticProvincia2').addEventListener('change', function() {
        const selectedProvincia = this.value;
        fillDistritoSelect(selectedProvincia, "staticDistrito2");
    });

    var b_FichaDatos = document.getElementById('formFichaDatos');

  if (b_FichaDatos) {
    b_FichaDatos.addEventListener('submit', function(e) {
      e.preventDefault();
      var datos = new FormData(e.target);
      datos.append("id_proceso",<?= $id_?>);
        datos.append("etapa",<?= $actual?>);
        datos.append("estado",<?= $estado?>);
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