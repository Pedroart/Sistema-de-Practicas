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