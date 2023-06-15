<div class="container-fluid text-center">
    <?php
    include _view_ . "/desempeno/submenu.php";
    ?>

    <h1 class="h2 mb-2 text-gray-800">Datos del jefe inmediato</h1>
    <p class="mb-4">
        Rellena la ficha con los datos de tu jefe inmediato, los datos deben ser auténticos
        y verídicos de lo contrario no podrá continuar con los siguientes pasos.
    </p>

    <?php if ($estado == 3) : ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Respuesta del Sistema</h4>
            <p>Etapa Finalizada</p>
        </div>
    <?php elseif ($estado == 2) : ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Respuesta del Sistema</h4>
            <p>Datos cargados exitosamente</p>
        </div>
    <?php elseif ($estado == 1) : ?>
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Docente: Loren Ipsu</h4>
            <p>Datos Erroneos empresa no encontrada</p>
        </div>
    <?php endif; ?>

    <div class="row justify-content-center">
        <form name="formFichaDatos" id="formFichaDatos">

            <div class="col">
                <div class="card mb-4">
                    
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="empresa" class="col-sm-4 col-form-label">Empresa</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="empresa" name="empresa">
                                    <option value="empresa_a">Empresa A</option>
                                    <option value="empresa_b">Empresa B</option>
                                    <option value="empresa_c">Empresa C</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticDNI" class="col-sm-4 col-form-label">DNI</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="staticDNI" value="7777777">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticDistrito" class="col-sm-4 col-form-label">Genero</label>
                            <div class="col-sm-8">
                                <select id="staticDistrito" class="form-control" required>
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticName" class="col-sm-4 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticName" value="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticAparterno" class="col-sm-4 col-form-label">Apellido Parterno</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticAparterno" value="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticAmarterno" class="col-sm-4 col-form-label">Apellido Marterno</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-user" id="staticAmarterno" value="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticDistrito" class="col-sm-4 col-form-label">Grado de Instruccíon</label>
                            <div class="col-sm-8">
                                <select id="staticDistrito" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticDirec" class="col-sm-4 col-form-label">Cargo</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticDirec" value="Name" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>