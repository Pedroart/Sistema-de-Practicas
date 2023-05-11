var b_confirmacion = document.getElementById('bconfirmacion');
b_confirmacion.addEventListener('click',function(e){
    e.preventDefault();
        var datos = new FormData();
        datos.append('id', b_confirmacion.dataset.proceso);
        
        fetch('http://practicas.test/proceso/create',{
            method: 'POST',
            body: datos
        })  .then(res => res.json())
            .then(data=> {
                if( data.resultado === true){ location.reload()}
            })
    });


var b_logout = document.getElementById('b_logout');
b_logout.addEventListener('click',function(e){
    e.preventDefault();
        fetch('http://practicas.test/proceso/create',{
            method: 'POST'
        })  .then(res => res.json())
            .then(data=> {
                if( data.resultado === true){ location.reload()}
            })
    });


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


b_matricula.addEventListener('submit',function(e){
    e.preventDefault();
    var datos = new FormData(e.target);

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