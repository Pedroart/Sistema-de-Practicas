<!DOCTYPE html>
<html>
<head>
    <title>Subir Archivo CSV</title>
</head>
<body>
    <form>
        <input type="file" id="archivo_csv_input" accept=".csv">
        <button type="button" id="subir_csv">Subir CSV</button>
    </form>
    
    <script>
        document.getElementById('subir_csv').addEventListener('click', function() {
            const inputFile = document.getElementById('archivo_csv_input').files[0];
            if (inputFile) {
                const formData = new FormData();
                formData.append('archivo_csv', inputFile);

                fetch('<?= _URL_ ?>/api/registraralumnos', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    console.log(data); // Aquí puedes manejar la respuesta del servidor
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            } else {
                console.log('Selecciona un archivo antes de subir.');
            }
        });
    </script>
</body>
</html>
