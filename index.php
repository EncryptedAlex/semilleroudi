<?php 
require "base.html";
startblock('article');
$usuarios = $consultar->listar('usuarios');
$datos = $_POST['DAtos']
$save = $consultar->guardar($tabla, $datos);
?>

<section style="text-align: center;">
    <h2>Sección Destacada</h2>
    <p>Contenido de la sección destacada.</p>
</section>
<form>
	<input type="" name="datos[nombres]">
<input type="" name="datos[apellidos]">	
</form>

<div class="row">
	<?php foreach ($usuarios as $key){ ?> 
		
		<div class="col-md-3" style="background: whitesmoke;">
			<a href="detalles_user.php?id=<?php echo $key['idUser']?>">

			<?php echo $key['nombre']?><br>
			<?php echo $key['apellido']?><br>
			<?php echo $key['email']?>
			</a>
		</div>
	<?php }?>	
</div>




<?php endblock();?>