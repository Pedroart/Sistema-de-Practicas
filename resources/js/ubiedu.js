// Obtener referencia a los elementos por su ID
var facultadSelect = document.getElementById("facultad");
var departamentoEDUSelect = document.getElementById("departamento");
var escuelaSelect = document.getElementById("escuela");

function loadConten() {
    //facultadSelect.innerHTML = "";
    departamentoEDUSelect.innerHTML = "";
    escuelaSelect.innerHTML = "";

    fetch(url+"/api/ubiedu/facultades")
        .then((response) => response.json())
        .then((data) => {
            data.forEach(function(item) {
                // Crear una opción para cada departamento
                var option = document.createElement('option');
                option.value = item.id;
                option.textContent = item.nombre;

                // Agregar la opción al select de departamentos
                facultadSelect.appendChild(option);
            });
        })
        .catch((error) => {
            // Manejar errores
            console.error("Ha ocurrido un error:", error);
        });
}

function changeFacultad()
{
    departamentoEDUSelect.innerHTML = "";
    escuelaSelect.innerHTML = "";
    var selector = facultadSelect.value;
    fetch(url+"/api/ubiedu/"+selector+"/departamentos")
        .then((response) => response.json())
        .then((data) => {
            data.forEach(function(item) {
                // Crear una opción para cada departamento
                var option = document.createElement('option');
                option.value = item.id;
                option.textContent = item.nombre;

                // Agregar la opción al select de departamentos
                departamentoEDUSelect.appendChild(option);
            });
            changeDepartamento();
        })
        .catch((error) => {
            // Manejar errores
            console.error("Ha ocurrido un error:", error);
        });

}

function changeDepartamento()
{
    escuelaSelect.innerHTML = "";
    var selector = departamentoEDUSelect.value;
    fetch(url+"/api/ubiedu/"+selector+"/escuelas")
        .then((response) => response.json())
        .then((data) => {
            data.forEach(function(item) {
                // Crear una opción para cada departamento
                var option = document.createElement('option');
                option.value = item.id;
                option.textContent = item.nombre;

                // Agregar la opción al select de departamentos
                escuelaSelect.appendChild(option);
            });
        })
        .catch((error) => {
            // Manejar errores
            console.error("Ha ocurrido un error:", error);
        });
}

if (departamentoEDUSelect) {
    // Agregar listeners de eventos si es necesario
    facultadSelect.addEventListener("change", changeFacultad);

    departamentoEDUSelect.addEventListener("change", changeDepartamento);

    facultadSelect.addEventListener("click", loadConten);
}
