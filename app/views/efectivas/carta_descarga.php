<?php
require _cor_.'/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

// Crear una instancia de Dompdf
$dompdf = new Dompdf();

$meses = array(
  1 => 'enero', 2 => 'febrero', 3 => 'marzo', 4 => 'abril', 5 => 'mayo', 6 => 'junio',
  7 => 'julio', 8 => 'agosto', 9 => 'septiembre', 10 => 'octubre', 11 => 'noviembre', 12 => 'diciembre'
);

// Traducciones para los nombres de los días de la semana en español
$diasSemana = array(
  'Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'
);

// Obtener el número del mes y día actual
$numeroMes = date('n'); // n para obtener el número del mes sin ceros iniciales
$numeroDiaSemana = date('w'); // w para obtener el número del día de la semana (0 para domingo, 1 para lunes, etc.)

// Obtener el día, mes y año actual en formato escrito en español
$diaActual = $diasSemana[$numeroDiaSemana];
$mesActual = $meses[$numeroMes];
$anioActual = date('Y');

// Generar la fecha completa en formato escrito en español
$fechaActualEnEspañol = $diaActual . ', ' . date('d') . ' de ' . $mesActual . ' de ' . $anioActual;

// Contenido HTML de la carta
$html = '<html>

<head>
  <style>
    body { font-family: Arial, sans-serif; }
    .fecha { text-align: right; }
    .titulo { text-align: center; font-size: 18px; font-weight: bold; margin-bottom: 10px; }
    .destinatario { font-weight: bold; }
    .cargo { font-style: italic; }
    .empresa { font-weight: bold; }
    .contenido { margin-top: 15px; }
    .despedida { margin-top: 30px; font-style: italic; }
  </style>
</head>
<body>
  <div class="fecha">Lima, '.$fechaActualEnEspañol.'</div>
  <div class="titulo">CARTA 1284 2015 IOPPP-UC</div>
  <div class="destinatario">Señor(a): MARTIN BUSTIOS MARTINEZ</div>
  <div class="cargo">GERENTE</div>
  <div class="empresa">MBM ASESORES Y CONSULTORES</div>
  <div class="contenido">
    <p>Presente.-</p>
    <p>Mi consideración:</p>
    <p>Es grato dirigirme a usted para expresarle mi cordial saludo y, a la vez, presentarle a la Srta. BAZOLA CORREA, Ammy Cinthia, identificada con de Matrícula N° 2011109947, Egresada de la Escuela Académico Profesional Contabilidad, Facultad de Ciencias de la Empresa de nuestra casa de estudios. La Srta. BAZOLA CORREA desea realizar sus Prácticas Pre Profesionales en vuestra Organización, con el propósito de complementar la formación recibida en nuestra institución. Por ello, le solicito a bien brindarle el apoyo y orientación que requiere para que pueda lograr con éxito su cometido.</p>
    <p>Esta realidad formativa lateral se desarrolla de acuerdo a lo previsto por la Ley sobre Prácticas Formativas Laterales, Ley N° 28518, artículo 13.</p>
  </div>
  <div class="despedida">Con la seguridad de su aceptación, me despido no sin antes expresarle las muestras de mi especial consideración.</div>
  <div class="despedida">Cordialmente,</div>
</body>
</html>';

// Cargar el contenido HTML en Dompdf
$dompdf->loadHtml($html);

// (Opcional) Configurar opciones, como el tamaño del papel, orientación, etc.
$dompdf->setPaper('A4', 'portrait');

// Renderizar el contenido HTML en un PDF
$dompdf->render();

// (Opcional) Descargar el PDF generado en el navegador
$dompdf->stream('carta.pdf', array('Attachment' => 0));
?>
