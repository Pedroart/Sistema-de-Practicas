var formulario  = document.getElementById(`input1ogin`);
const domain = window.location.hostname;


loginForm.addEventListener('submit',function(e){
            e.preventDefault();
            var datos = new FormData(e.target);
            console.log(datos);
            fetch(`http://${domain}/login`,{
                method: 'POST',
                body:  datos
            })  .then(res => res.json())
                .then(data=> {
                    if( data.resultado === true){ location.reload();}
                    else{
                        respuesta.innerHTML='<div class=`alert alert-warning` role=`alert`>Credenciales incorrectas</div>';
                        console.log(data);
                    }
                })
        });