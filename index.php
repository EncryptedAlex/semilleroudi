<?php 
require "template_admin.html";
startblock('article');
$lista = $consultar->listar_pilotos();

?>

<h1>REsultados!!! <?php echo count($lista)?></h1>
<?php 
$lista = $consultar->seleccionar_piloto('honda','cMotor');

?>
<?php  endblock();?>