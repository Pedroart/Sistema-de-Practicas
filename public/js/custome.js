var b_logout = document.getElementById('b_logout');

b_logout.addEventListener('click',function(e){
        e.preventDefault();


            fetch('http://practicas.test/logout',{
                method: 'POST'
            })  .then(res => res.json())
                .then(data=> {
                    if( data.resultado === true){ location.reload()}
                })
        });

var b_matricula = document.getElementById('formMatricula');

var datos = new FormData();

b_matricula.addEventListener('submit',function(e){
    e.preventDefault();
    
    var datos = new FormData();
    datos.append('semestre',  document.getElementById('semestre').value);
    
    // Obtener los archivos seleccionados
  var ficha_matricula = document.getElementById('ficha_matricula').files[0];
  var record_academico = document.getElementById('RecordAcademico').files[0];

  // Agregar los archivos al FormData
  datos.append('ficha_matricula', ficha_matricula);
  datos.append('RecordAcademico', record_academico);

    console.log(datos);
    fetch('http://practicas.test/validacion',{
                method: 'POST',
                body:  datos
            })  .then(res => res.json())
                .then(data=> {
                    if( data.resultado === true){ location.reload();}
                    else{
                        console.log(data);
                    }
                })
        });