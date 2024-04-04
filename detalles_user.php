<?php 
require "base.html";
startblock('article');
$id = $_GET['id'];
$usuario = $consultar->seleccionar_segun('usuarios', 'idUser', $id);
var_dump($usuario);

?>
<section style="text-align: center;">
    <h2>Detallers usuario</h2>
</section>


<div class="row">
	
</div>




<?php endblock();?>