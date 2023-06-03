<div class="container-fluid text-center">
    <?php
    include _view_ . "/efectivas/submenu.php";

    $modelo = new app\models\user();
    $Datos_usuari=$modelo->Datos_Alumno($_SESSION['id_user']);
    ?>

    <h1 class="h2 mb-2 text-gray-800">FICHA DE DATOS - carta de presentación</h1>
    <p class="mb-4">
        La carta de presentación es un documento formal a nombre de la Universidad
        dirigida a una empresa ofreciendo tus servicios de manera espontánea. Su
        función es presentarte e introducir brevemente tu candidatura.
    </p>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Respuesta del Sistema</h4>
        <p>Etapa Finalizada</p>
    </div>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Respuesta del Sistema</h4>
        <p>Datos cargados exitosamente</p>
    </div>

    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Docente: Loren Ipsu</h4>
        <p>Datos Erroneos empresa no encontrada</p>
    </div>

    <form>
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
                                <input type="text" class="form-control" id="staticName" value="<?= $Datos_usuari['nombre']?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticAparterno" class="col-sm-4 col-form-label">Apellido Parterno</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticAparterno" value="<?=$Datos_usuari['apellido_paterno']?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticAmarterno" class="col-sm-4 col-form-label">Apellido Marterno</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-user" id="staticAmarterno" value="<?=$Datos_usuari['apellido_materno']?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticDNI" class="col-sm-4 col-form-label">DNI</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="staticDNI" value="<?=$Datos_usuari['DNI']?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticCiclo" class="col-sm-4 col-form-label">Ciclo</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticCiclo" value="<?=$_SESSION['semestre']?>" readonly>
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
                                <input type="text" class="form-control" id="staticDirec" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticCorreo1" class="col-sm-4 col-form-label">Correo 1</label>
                            <div class="col-sm-8">
                                <input type="mail" class="form-control" id="staticCorreo1" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticCelular" class="col-sm-4 col-form-label">Celular</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="staticCelular"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticDepartamento1" class="col-sm-4 col-form-label">Departamento</label>
                            <div class="col-sm-8">
                                <select id="staticDepartamento1" class="form-control" required>
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticProvincia1" class="col-sm-4 col-form-label">Provincia</label>
                            <div class="col-sm-8">
                                <select id="staticProvincia1" class="form-control" required>
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticDistrito1" class="col-sm-4 col-form-label">Distrito</label>
                            <div class="col-sm-8">
                                <select id="staticDistrito1" class="form-control" required>
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
                                <input type="number" class="form-control" id="staticRUC" value="7" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticNombreEmpres" class="col-sm-4 col-form-label">Nombre de la Empresa*</label>
                            <div class="col-sm-8">
                                <input type="mail" class="form-control" id="staticNombreEmpres" value="Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticDirecLabo" class="col-sm-4 col-form-label">Dirección*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticDirecLabo" value="Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticDepartamento2" class="col-sm-4 col-form-label">Departamento</label>
                            <div class="col-sm-8">
                                <select id="staticDepartamento2" class="form-control" required>
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticProvincia2" class="col-sm-4 col-form-label">Provincia</label>
                            <div class="col-sm-8">
                                <select id="staticProvincia2" class="form-control" required>
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticDistrito2" class="col-sm-4 col-form-label">Distrito</label>
                            <div class="col-sm-8">
                                <select id="staticDistrito2" class="form-control" required>
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
                                <select id="Genero" class="form-control" required>
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticNameRepre" class="col-sm-4 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticNameRepre" value="Name" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticAparternorRepre" class="col-sm-4 col-form-label">Apellido Parterno</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticAparternorRepre" value="Name" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticAmarterno" class="col-sm-4 col-form-label">Apellido Marterno</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-user" id="staticAmarterno" value="Name" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="GradoInstruccion" class="col-sm-4 col-form-label">Grado de Instruccíon</label>
                            <div class="col-sm-8">
                                <select id="GradoInstruccion" class="form-control" required>
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Cargo" class="col-sm-4 col-form-label">Cargo</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="Cargo" value="Name" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>

<script src="<?= _URL_ ?>/js/selector.js"></script>