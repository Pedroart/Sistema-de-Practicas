<div class="container-fluid text-center">
    <?php
    include _view_ . "/efectivas/submenu.php";
    ?>

    <h2 class="h2 mb-2 text-gray-800">Ficha de control Mensual</h2>
    <p class="mb-4">
    Es un documento en donde se registran las posibles actividades a
realizarse durante todo el periodo prácticas, el cual debe estar firmado y
sellado por tu jefe inmediato y tu persona. Debe escanear y subir este
documento al sistema en formato PDF.
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
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 ">
            <div class="card mb-4">
                <div class="card-header">
                    Fichas Mensuales
                </div>
                <div class="card-body">
                    <form>
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
                            <label for="Plan_Actividades" class="col-sm-4 col-form-label">Plan de Actividades</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control-file" id="Plan_Actividades" name="Plan_Actividades">
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>