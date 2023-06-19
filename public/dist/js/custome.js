var b_logout = document.getElementById("b_logout");
b_logout.addEventListener("click", function (e) {
  e.preventDefault();

  fetch("http://practicas.test/logout", {
    method: "POST",
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.resultado === true) {
        window.location.href = "http://practicas.test";
      }
    });
});

function fillDepartamentosSelect(id_selector) {
  fetch("http://practicas.test/api/departamentos", {
    method: "POST",
  })
    .then((response) => response.json())
    .then((data) => {
      const selectDepartamento = document.getElementById(id_selector);
      selectDepartamento.innerHTML = "";

      data.forEach((departamento) => {
        const option = document.createElement("option");
        option.value = departamento["id_departamento"];
        option.textContent = departamento["nombre_departamento"];
        selectDepartamento.appendChild(option);
      });
    })
    .catch((error) => {
      console.error("Error fetching departamentos:", error);
    });
}

function fillProvinciaSelect(idDepartamento, id_selector) {
    
    fetch("http://practicas.test/api/provincia", {
    method: "POST",
    body: new URLSearchParams({
      id: idDepartamento,
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      const selectProvincia = document.getElementById(id_selector);
      selectProvincia.innerHTML = "";
      console.log(data);
      data.forEach((provincia) => {
        const option = document.createElement("option");
        option.value = provincia["id_provincia"];
        option.textContent = provincia["nombre_provincia"];
        selectProvincia.appendChild(option);
      });
    })
    .catch((error) => {
      console.error("Error fetching provincia:", error);
    });
}

function fillDistritoSelect(idProvincia, id_selector) {
    console.log(idProvincia);
    fetch('http://practicas.test/api/distrito', {
      method: 'POST',
      body: new URLSearchParams({
        id: idProvincia
      })
    })
      .then(response => response.json())
      .then(data => {
        const selectDistrito = document.getElementById(id_selector);
        selectDistrito.innerHTML = '';
        
        data.forEach(distrito => {
          const option = document.createElement('option');
          option.value = distrito.id_distrito;
          option.textContent = distrito.nombre_distrito;
          selectDistrito.appendChild(option);
        });
      })
      .catch(error => {
        console.error('Error fetching distrito:', error);
      });
  }