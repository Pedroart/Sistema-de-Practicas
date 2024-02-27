
var UbiDistrito = document.getElementById('UbiDistrito');
var UbiProvincia = document.getElementById('UbiProvincia');
var UbiDepartamento = document.getElementById('UbiDepartamento');

function DistritoCambia() {}
function ProvinciaCambia() {
    UbiDistrito.innerHTML = '';
    var selector = UbiProvincia.value;
    fetch('api/ubigeo/'+selector+'/distritos')
    .then(response => response.json())
    .then(data => {
        data.forEach(function(item) {
            // Crear una opción para cada departamento
            var option = document.createElement('option');
            option.value = item.id;
            option.textContent = item.nombre;

            // Agregar la opción al select de departamentos
            UbiDistrito.appendChild(option);
        });
    })
    .catch(error => {
        // Manejar errores
        console.error('Ha ocurrido un error:', error);
    });
}
function DepartamentoCambia() {
    UbiProvincia.innerHTML = '';
    UbiDistrito.innerHTML = '';
    var selector = UbiDepartamento.value;
    fetch('api/ubigeo/'+selector+'/provincias')
    .then(response => response.json())
    .then(data => {
        data.forEach(function(item) {
            // Crear una opción para cada departamento
            var option = document.createElement('option');
            option.value = item.id;
            option.textContent = item.nombre;

            // Agregar la opción al select de departamentos
            UbiProvincia.appendChild(option);
        });
        ProvinciaCambia();
    })
    .catch(error => {
        // Manejar errores
        console.error('Ha ocurrido un error:', error);
    });
}

if(UbiDepartamento)
{
    UbiDistrito.addEventListener('change',DistritoCambia);
    UbiProvincia.addEventListener('change',ProvinciaCambia);
    UbiDepartamento.addEventListener('change',DepartamentoCambia);

    UbiDepartamento.addEventListener('click', function() {
        UbiProvincia.innerHTML = '';
        UbiDistrito.innerHTML = '';
        //UbiDepartamento.innerHTML = '';
        fetch('api/ubigeo/departamentos')
        .then(response => response.json())
        .then(data => {
            data.forEach(function(departamento) {
                // Crear una opción para cada departamento
                var option = document.createElement('option');
                option.value = departamento.id;
                option.textContent = departamento.nombre;

                // Agregar la opción al select de departamentos
                UbiDepartamento.appendChild(option);
            });
        })
        .catch(error => {
            // Manejar errores
            console.error('Ha ocurrido un error:', error);
        });

    });
}

