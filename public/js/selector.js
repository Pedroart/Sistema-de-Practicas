class SelectorLugar {
    constructor(departamentoId,provinciaId, distritoId) {
      this.departamentoId = departamentoId;
      this.provinciaId = provinciaId;
      this.distritoId = distritoId;
    }
    actualizarDepartamento(){

        var datos = new FormData();
        datos.append('id', 18);

        fetch(`http://practicas.test/api/departamentos`,{
            method: 'POST',
            body:  datos
        })
        .then(response => response.json())
        .then(data => {
          const selector = document.querySelector(`#${this.departamentoId}`);
          selector.innerHTML = '';
          for (const dati of data) {
            const option = document.createElement('option');
            option.value = dati.id_departamento;
            option.textContent = dati.nombre_departamento;
            selector.appendChild(option);
          }
        });  
    }
    actualizarProvincia(){

        var datos = new FormData();
        datos.append('id', document.querySelector(`#${this.departamentoId}`).value);

        fetch(`http://practicas.test/api/provincia`,{
            method: 'POST',
            body:  datos
        })
        .then(response => response.json())
        .then(data => {
          const selector = document.querySelector(`#${this.provinciaId}`);
          selector.innerHTML = '';
          for (const dati of data) {
            const option = document.createElement('option');
            option.value = dati.id_departamento;
            option.textContent = dati.nombre_departamento;
            selector.appendChild(option);
          }
        });  
    }
  }

var b_departamento1 = document.getElementById('staticDepartamento1');

var b_provincia1 = document.getElementById('staticProvincia1');
var b_distrito1 = document.getElementById('staticDistrito1');
var selectar = new SelectorLugar('staticDepartamento1','staticProvincia1','staticDistrito1');
selectar.actualizarDepartamento();
    
b_departamento1.addEventListener('click',selectar.actualizarProvincia());

var b_departamento2 = document.getElementById('staticDepartamento2');
if(b_departamento2){
    var b_provincia2 = document.getElementById('staticProvincia2');
    var b_distrito2 = document.getElementById('staticDistrito2');
}