<?php 
$active = ["","","","active","",""];
include _view_."/desempeno/submenu.php"?>

<h1 class="h3 mb-2 text-gray-800">FICHA DE DATOS</h1>
<p class="mb-4">
  Rellena la ficha con tus datos personales, estos deben ser auténticos y verídicos de lo contrario podría tener inconvenientes con el proceso.
</p>

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
              <input type="text" class="form-control" id="staticName" value="Name" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticAparterno" class="col-sm-4 col-form-label">Apellido Parterno</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="staticAparterno" value="Name" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticAmarterno" class="col-sm-4 col-form-label">Apellido Marterno</label>
            <div class="col-sm-8">
              <input type="text" class="form-control form-control-user" id="staticAmarterno" value="Name" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticDNI" class="col-sm-4 col-form-label">DNI</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="staticDNI" value="7777777" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticCiclo" class="col-sm-4 col-form-label">Ciclo</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="staticCiclo" value="7" readonly>
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
            <label for="staticDirec" class="col-sm-4 col-form-label">Dirección*</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="staticDirec" value="Name" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticCorreo1" class="col-sm-4 col-form-label">Correo 1*</label>
            <div class="col-sm-8">
              <input type="mail" class="form-control" id="staticCorreo1" value="Name" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticCorreo2" class="col-sm-4 col-form-label">Correo 2</label>
            <div class="col-sm-8">
              <input type="mail" class="form-control" id="staticCorreo2" value="Name" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticTelCasa" class="col-sm-4 col-form-label">Teléf. Casa</label>
            <div class="col-sm-8">
              <input type="number" class="form-control form-control-user" id="staticTelCasa" value="Name" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticTelOficina" class="col-sm-4 col-form-label">Teléf. Oficina</label>
            <div class="col-sm-8">
              <input type="number" class="form-control form-control-user" id="staticTelOficina" value="Name" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticCelular" class="col-sm-4 col-form-label">Celular*</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="staticCelular" value="7777777" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticOtro" class="col-sm-4 col-form-label">Otro</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="staticOtro" value="7" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticDepartamento" class="col-sm-4 col-form-label">Departamento</label>
            <div class="col-sm-8">
              <select id="staticDepartamento" class="form-control" required>
                <option selected>Choose...</option>
                <option>...</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticProvincia" class="col-sm-4 col-form-label">Provincia</label>
            <div class="col-sm-8">
              <select id="staticProvincia" class="form-control" required>
                <option selected>Choose...</option>
                <option>...</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticDistrito" class="col-sm-4 col-form-label">Distrito</label>
            <div class="col-sm-8">
              <select id="staticDistrito" class="form-control" required>
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
            <label for="staticOtro" class="col-sm-4 col-form-label">Numero de RUC de la Empresa</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="staticOtro" value="7" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticCorreo1" class="col-sm-4 col-form-label">Nombre de la Empresa*</label>
            <div class="col-sm-8">
              <input type="mail" class="form-control" id="staticCorreo1" value="Name" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticDirec" class="col-sm-4 col-form-label">Dirección*</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="staticDirec" value="Name" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticDepartamento" class="col-sm-4 col-form-label">Departamento</label>
            <div class="col-sm-8">
              <select id="staticDepartamento" class="form-control" required>
                <option selected>Choose...</option>
                <option>...</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticProvincia" class="col-sm-4 col-form-label">Provincia</label>
            <div class="col-sm-8">
              <select id="staticProvincia" class="form-control" required>
                <option selected>Choose...</option>
                <option>...</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticDistrito" class="col-sm-4 col-form-label">Distrito</label>
            <div class="col-sm-8">
              <select id="staticDistrito" class="form-control" required>
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
              <input type="text" class="form-control" id="staticName" value="Name" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticAparterno" class="col-sm-4 col-form-label">Apellido Parterno</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="staticAparterno" value="Name" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticAmarterno" class="col-sm-4 col-form-label">Apellido Marterno</label>
            <div class="col-sm-8">
              <input type="text" class="form-control form-control-user" id="staticAmarterno" value="Name" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticDistrito" class="col-sm-4 col-form-label">Grado de Instruccíon</label>
            <div class="col-sm-8">
              <select id="staticDistrito" class="form-control" required>
                <option selected>Choose...</option>
                <option>...</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticDirec" class="col-sm-4 col-form-label">Cargo*</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="staticDirec" value="Name" required>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</form>