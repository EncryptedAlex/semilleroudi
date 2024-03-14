<?php 
require "template_admin.html";
startblock('article');
$numero1 = 5;
$numero2 = 2;
$nombre = "Will";
$rta = $numero1 + $numero2;
$a = array('lunes','martes','miercoles');
for($i=0;$i<count($a);$i++){
?>

<h2><?php echo $a[$i].' '.$nombre.' '.$rta;?></h2>

<?php  
}


endblock();?>
