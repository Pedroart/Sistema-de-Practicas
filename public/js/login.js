var formulario  = document.getElementById('input1ogin');

formulario.addEventListener('submit',function(e){
            e.preventDefault();
            var datos = new FormData(formulario);
            
            fetch('http://practicas.test/login',{
                method: 'POST',
                body: datos
            })  .then(res => res.json())
                .then(data=> {
                    if( data.resultado === true){ location.reload()}
                })
        });