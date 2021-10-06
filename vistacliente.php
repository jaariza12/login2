<?php

include("boostrap.html")

?>
<?php
include("db.php");
include("modelocliente.php")
?>
<html>
    <head>
        <title>
            Administrador
        </title>
    </head>
    
    <body>
        <a href="clientelista.php" style="outline: none; font-size:30px;padding:10px;
    display: block;width:400px;color:black;border-radius: 2px;  
    cursor:pointer;border:3px solid #00b8eb;margin: 20px auto;">ir lista de clientes crud</a>
        <center>
               <H1>Clientes del supermercado </H1>
               <table border="1">
                        <tr>
                            <td>Código cliente</td>
                            <td>Nombre</td>
                            <td>Apellidos</td>
                            <td>Teléfono</td>
                           
                        </tr>
                        <?php
                            $c= new Conexion();
                            $fun=$c->conectar();
                            $p ="select * from cliente";
                            $rs = mysqli_query($fun,$p);
                            $arre = mysqli_fetch_row($rs);

                            do{
                        ?>
                        <tr>
                                <td><?php echo $arre[0] ?></td>
                                <td><?php echo $arre[1] ?></td>
                                <td><?php echo $arre[2] ?></td>
                                <td><?php echo $arre[3] ?></td>
                               
                        </tr>
                        <?php
	 					}while($arre = mysqli_fetch_row($rs));
					?>
               </table> 
        </center>


       <a href="clientelista.php"></a>
    </body>
</html>
