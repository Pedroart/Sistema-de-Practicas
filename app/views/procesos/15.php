<div class="container-fluid text-center">
    <?php

    $modelo = new app\models\user();
    $Datos_usuari = $modelo->Datos_Alumno($data["id_alumno"]);
    ?>

<div class="row">
    <div class="col-md-3">
        <a href="<?= _URL_ ?>/procesos/<?=$data["id"]?>/Estado" class="btn btn-primary btn-block mb-4"><b>Estado</b></a>

        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <button onclick="aceptar()" class="btn btn-success btn-block"><b>Aceptar</b></button>
                <button onclick="revisar()" class="btn btn-warning btn-block"><b>Revisar</b></button>
                <button onclick="rechazar()" class="btn btn-danger btn-block"><b>Rechazar</b></button>
            </div>
            <div class="card-footer">
            <input class="form-control" id="Ficha"; type="text" placeholder="Ingrese Comentario">
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
                            <label for="staticDNI" class="col-sm-4 col-form-label">Codigo</label>
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

    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-text-width"></i>
                    Datos del Centro Laboral
                </h3>
            </div>

            <div class="card-body">
                        <div class="form-group row">
                            <label for="staticRUC" class="col-sm-4 col-form-label">Numero de RUC de la Empresa</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="empresa_RUC" value="7" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticNombreEmpres" class="col-sm-4 col-form-label">Nombre de la Empresa*</label>
                            <div class="col-sm-8">
                                <input type="mail" class="form-control" name="empresa_NombreEmpres" value="Name" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticDirecLabo" class="col-sm-4 col-form-label">Dirección*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="empresa_DirecLabo" value="Name" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticDepartamento2" class="col-sm-4 col-form-label">Departamento</label>
                            <div class="col-sm-8">
                                <select id="staticDepartamento2" name="empresa_Departamento" class="form-control" readonly>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticProvincia2" class="col-sm-4 col-form-label">Provincia</label>
                            <div class="col-sm-8">
                                <select id="staticProvincia2" name="empresa_Provincia2" class="form-control" readonly>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticDistrito2" class="col-sm-4 col-form-label">Distrito</label>
                            <div class="col-sm-8">
                                <select id="staticDistrito2" name="empresa_Distrito2" class="form-control" readonly>
                                </select>
                            </div>
                        </div>
                    </div>
            
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-text-width"></i>
                    Datos del Representante de la Empresa
                </h3>
            </div>

            <div class="card-body">
                        <div class="form-group row">
                            <label for="Genero" class="col-sm-4 col-form-label">Genero</label>
                            <div class="col-sm-8">
                                <select name="Genero" class="form-control" readonly>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticNameRepre" class="col-sm-4 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="representante_Name" value="Name" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticAparternorRepre" class="col-sm-4 col-form-label">Apellido Parterno</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="representante_Aparternor" value="Name" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticAmarterno" class="col-sm-4 col-form-label">Apellido Marterno</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-user" name="representante_Amarterno" value="Name" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="GradoInstruccion" class="col-sm-4 col-form-label">Grado de Instruccíon</label>
                            <div class="col-sm-8">
                                <select name="representante_GradoInstruccion" class="form-control" readonly>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Cargo" class="col-sm-4 col-form-label">Cargo</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="Cargo" value="Name" readonly>
                            </div>
                        </div>
                    </div>
            
        </div>

    </div>
</div>

<script>
    function aceptar() {
            var datos = new FormData();
            datos.append("id_proceso", <?= $data["id_etapa"] ?>);
            fetch('http://practicas.test/procesos/aceptado/<?= $data["id"] ?>', {
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