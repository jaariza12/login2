
<?php

include("boostrap.html")

?>
<?php
include("db.php");


if($_POST)
{
//$obj->codigoCliente  = $_POST['codigoCliente '];
$obj->nombreCliente = $_POST['nombreCliente'];
//$obj->apellidoCliente= $_POST['apellidoCliente'];
//$obj->telefonoCliente= $_POST['telefonoCliente'];
}
?>
<?php
$correrPagina = $_SERVER["PHP_SELF"]; /* es una variable súper global que retorna el nombre
 del archivo que actualmente está ejecutando el script. Así que, $_SERVER[“PHP_SELF”] envía los datos del formulario a la misma página, en vez de saltar a una página distinta*/
$maximoDatos = 5;
$paginaNumero = 0;

if(isset($_GET['paginaNumero'])){
   $paginaNumero = $_GET['paginaNumero'];
}
$inicia = $paginaNumero * $maximoDatos;

?>
<?php

if(isset($_POST['consulta']))
{
									
									$c = new Conexion();
									$cone = $c->conectar();	
									$c = "select * from cliente where nombreCliente LIKE 
									'%$obj->nombreCliente %' ";
                                    $limite =sprintf("%s limit %d, %d",$c, $inicia, $maximoDatos);
									$rs = mysqli_query($cone,$limite);
									$arreglo = mysqli_fetch_row($rs);
									


}else {
									$c = new Conexion();
									$cone = $c->conectar();	
									$c = "select * from cliente ";
                                    $limite =sprintf("%s limit %d, %d",$c, $inicia, $maximoDatos);
									$rs = mysqli_query($cone,$limite);
									$arreglo = mysqli_fetch_row($rs);
																		



}

?>

<?php
if(isset($_GET['totalArreglo'])){
	$totalArreglo = $_GET['totalArreglo'];
	
}
	else{
		$lista = mysqli_query($cone,$c);
		$totalArreglo = mysqli_num_rows($lista);
	}
$totalPagina = ceil($totalArreglo/$maximoDatos)-1;

?>

<?php
$cargarPagina = "";
if(!empty($_SERVER['QUERY_STRING'])){ /* Consulta una cadena de la base de datos empty(vacio) */
	$parametro1 = explode("&", $_SERVER['QUERY_STRING']); /* Divide la consulta para meterla en un arreglo */
	$nuevoParametro = array();
	foreach($parametro1 as $parametro2){
			if(stristr($parametro2, "paginaNumero")==false && stristr($parametro2, "totalArreglo")==false){ //Compara una cadena dentro de otra cadena
				 array_push($nuevoParametro, $parametro2);
			}
	}
	if(count($nuevoParametro)!=0){
		$cargarPagina = "&". htmlentities(implode("&", $nuevoParametro));
	}
}
$cargarPagina = sprintf("&totalArreglo=%d%s", $totalArreglo, $cargarPagina);


?>

<!DOCTYPE html>
<html lang="es">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="css, php, html">
      <title>Modulo Administrativo</title>
      
	
      
  </head>
  <body>
   
        <form action="" name="cliente"  method="POST">
        <center>
            <h2>clientes</h2>
            
			<div>
			  <a href="cliente.php"><input type="button" value="Agregar"></a>	
			  <label for="nombrecliente">Buscar Nombre</label>
              <input type="text" id="nombreCliente" name="nombreCliente"   placeholder="nombre cliente consulta" >
              
			  <input type="submit" name="modifica" value="Modificar">
			  <input type="submit" name="elimina" value="Eliminar">
              <input type="submit" name="consulta" value="Consultar" onClick="return validar(this.form)">
			  <input type="submit" name="nuevo" value="Limpiar">
              <input type="submit" name="salir" value="X">
            </div>
        <br>
        <br>
        <br>
         
		
        
			</center>
			<center>
          <table width="544" border="1" >
                
                	<tr>
                    	<td><b>Codigo<b></td>
                        <td><b>nombrecliente</b></td>
						<td><b>apellidoCliente</b></td>
						<td><b>Teléfonocliente</b></td>
						
						
						
								
                        
                    </tr>
                    <?php
									$c = new Conexion();
									$cone = $c->conectar();	
									$c1 = "select * from cliente ";
                                   	$rs1 = mysqli_query($cone,$limite);
									$arreglo = mysqli_fetch_row($rs1);
					    do{
					?>
					<tr>
						<td><?php echo $arreglo[0] ?></td>
						<td><?php echo $arreglo[1] ?></td>
						<td><?php echo $arreglo[2] ?></td>
                        <td><?php echo $arreglo[3] ?></td>
						<td><input type="submit" name="modifica" value="Modificar"></td>
						<td><input type="submit" name="elimina" value="Eliminar"></td>
    								
                        
					</tr>
					<?php
	 					}while($arreglo = mysqli_fetch_row($rs1))
					?>
                </table>                    
                <br>
                <h5><?php printf("Total de Registros Encontrados %d", $totalArreglo) ?></h5>
                <br>
                <br>
                <hr>
                <table border=1>
                         	
                
                <tr>
                <td><?php  
                    if($paginaNumero > 0){
                ?> <a href="<?php printf("%s?paginaNumero=%d%s",$correrPagina,0,$cargarPagina) ?>" id="paginador"> < </a> <?php }?></td>
                <td><?php  
                    if($paginaNumero > 0){
                ?> <a href="<?php printf("%s?paginaNumero=%d%s",$correrPagina, max(0,$paginaNumero-1),$cargarPagina) ?>" id="paginador" > << </a> <?php }?></td>
            <td><?php 
                    if($paginaNumero < $totalPagina ){
                ?> <a href="<?php printf("%s?paginaNumero=%d%s",$correrPagina, min($totalPagina,$paginaNumero+1),$cargarPagina) ?>" id="paginador"> >> </a> <?php }?></td>
            <td><?php 
                    if($paginaNumero < $totalPagina ){
                ?> <a href="<?php printf("%s?paginaNumero=%d%s",$correrPagina, $totalPagina,$cargarPagina) ?>" id="paginador"> ></a> <?php } ?></td>
            
                </tr>
				</table>
				</center>
          </form>
		
		  
		  </table>

      </section>
      <a href="pagina4.php" style="    outline: inherit;
    font-size: 21px;
    padding: 10px 31px;
    display: block;
    width: 402px;
    color: black;
    border-radius: -16px;
    cursor: pointer w-resize;
    border: 6px solid red;
    margin: 5px auto;">texto</a><br>
    
    <a href=" vistacliente.php" style="    outline: inherit;
    font-size: 21px;
    padding: 10px 31px;
    display: block;
    width: 402px;
    color: black;
    border-radius: -16px;
    cursor: pointer w-resize;
    border: 6px solid #00b8eb;
    margin: 5px auto;">volver atras.CLIENTE-LISTA</a>
  </body>
</html>