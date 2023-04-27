var formulario  = document.getElementById("input1ogin");


loginForm.addEventListener('submit',function(e){
            e.preventDefault();
            var datos = Object.fromEntries(new FormData(e.target).entries());
            console.log(datos);
            fetch('http://practicas.test/login',{
                method: 'POST',
                body:  JSON.stringify(datos)
            })  .then(res => res.json())
                .then(data=> {
                    if( data.resultado === true){ location.reload();}
                    else{
                        respuesta.innerHTML=`<div class="alert alert-warning" role="alert">Credenciales incorrectas</div>`;
                    }
                })
        });