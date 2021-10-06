
<?php
include("db.php");
include("modelocliente.php");
include("boostrap.html")

?>


<?php


$obj = new Cliente ();
if($_POST){
    $obj->codigoCliente = $_POST['codigoCliente'];
    $obj->nombreCliente = $_POST['nombreCliente'];
    $obj->apellidoCliente = $_POST['apellidoCliente'];
    $obj->telefonoCliente = $_POST['telefonoCliente'];
   
}
if(isset($_POST['limpia'])){

    $obj->limpiar();


}
if(isset($_POST['adicionar'])){

    $obj->guardar();
    

}
if(isset($_POST['buscar'])){

    $obj->consultar();
    

}


if(isset($_POST['modifica'])){

    $obj->modificar();
    

}
if(isset($_POST['elimina'])){

    $obj->eliminar();

}
?>
<html>
    <head>
        <title>Administrativo</title>
    </head>
    <body>
           <center>
                    <h1>Cliente</h1>
                   <hr>
                    <form name="cliente" action="" method="POST">
                        <table border="1">
                            <tr>
                                <td bgcolor="000000"><font color="FFFFFF" face="arial" size="4">Código</font></td>                              
                            <td><input class="form-control" type="text" name="codigoCliente" value="<?php echo $obj->codigoCliente ?>" placeholder="Digite el Documento" size="40"></td>  
                            </tr>
                         
                            <tr>
                                <td bgcolor="000000"><font color="FFFFFF" face="arial" size="4">Nombre</font></td>                              
                                <td><input class="form-control" type="text" name="nombreCliente" value="<?php echo $obj->nombreCliente ?>" placeholder="Digite el Tipo de Documento" size="40"></td>  
                            </tr>
                          
                            <tr>
                                <td bgcolor="000000"><font color="FFFFFF" face="arial" size="4">Apellido</font></td>                              
                                <td><input class="form-control" type="text" name="apellidoCliente" value="<?php echo $obj->apellidoCliente ?>" placeholder="Digite el Nombre del Cliente" size="40"></td>  
                            </tr>
                         
                            <tr>
                                <td bgcolor="000000"><font color="FFFFFF" face="arial" size="4">telefono</font></td>                              
                                <td><input class="form-control" type="text" name="telefonoCliente" value="<?php echo $obj->telefonoCliente ?>" placeholder="Digite el Apellido del Cliente" size="40"></td>  
                            </tr>
                           
                            <tr>                              
                        
		<center>
			
            </div>
			</center>   
                                <td colspan="2">
                                    <center>
                                        
                                        <input  class="btn btn-primary" type="submit" name="limpia" value="Nuevo">
                                        <input class="btn btn-primary" type="submit" name="adicionar" value="Guardar">
                                        <input class="btn btn-primary" type="submit" name="buscar" value="Consulta">
                                        <input class="btn btn-primary" type="submit" name="modifica" value="Modificar">
                                        <input class="btn btn-primary" type="submit" name="elimina" value="Eliminar"> <br>

                                        <button  bgcolor="000000">    <a rel="stylesheet" href="clientelista.php" > click para ver clientes</button>

                                    </center>
                                </td>  
                            </tr>
                        </table>
                    </form> 
           </center> 
    </body>
</html>


