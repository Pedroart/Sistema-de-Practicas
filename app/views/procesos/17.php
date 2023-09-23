<div class="container-fluid text-center">
    <?php

    $modelo = new app\models\user();
    $Datos_usuari = $modelo->Datos_Alumno($data["id_alumno"]);
    ?>

    <div class="row">
        <div class="col-md-3">
            <a href="<?= _URL_ ?>/procesos/<?= $data["id"] ?>/Estado" class="btn btn-primary btn-block mb-4"><b>Estado</b></a>

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <button onclick="aceptar()" class="btn btn-success btn-block"><b>Aceptar</b></button>
                    <button onclick="revisar()" class="btn btn-warning btn-block"><b>Revisar</b></button>
                    <button onclick="rechazar()" class="btn btn-danger btn-block"><b>Rechazar</b></button>
                </div>
                <div class="card-footer">
                    <input class="form-control" id="Ficha" ; type="text" placeholder="Ingrese Comentario">
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    Datos Personales
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="staticName" class="col-sm-4 col-form-label">Nombre</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="<?= $Datos_usuari['nombre'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticAparterno" class="col-sm-4 col-form-label">Apellido Parterno</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="<?= $Datos_usuari['apellido_paterno'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticDNI" class="col-sm-4 col-form-label">Codigo</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" value="<?= $Datos_usuari['DNI'] ?>" readonly>
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

        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-text-width"></i>
                        Carta de Aceptacion
                    </h3>
                </div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="empresa" class="col-sm-4 col-form-label">Empresa</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="empresa" name="empresa">
                                <option value="<?= $id_empresa ?>"><?= $empresa_nombre ?></option>
                            </select>
                        </div>
                    </div>


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
        function aceptar() {
            fetch('<?= _URL_ ?>/proceso/aceptado/<?= $data["id"] ?>', {
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
    </script>