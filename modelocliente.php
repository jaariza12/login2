<?php


      class Cliente {
                    public $codigoCliente;
                    public $nombreCliente;
                    public $apellidoCliente;
                    public $telefonoCliente;

                    function limpiar(){
                                        $this->codigoCliente =null;;
                                        $this->nombreCliente=null;
                                        $this->apellidoCliente=null;
                                        $this->telefonoCliente=null;
                                    
                    }


                    function guardar(){
                        $c= new Conexion();
                        $fun=$c->conectar();
                        $p = "select * from cliente where codigoCliente = '$this->codigoCliente'";
                        $r1 = mysqli_query($fun, $p);
                        if(mysqli_fetch_array($r1)){
                                    echo "<script> alert ('El Cliente ya existe en el Sistema')</script>";
                        }
                        else{
                              $insertar = "insert into cliente values('  $this->codigoCliente',
                                                                      '$this->nombreCliente',
                                                                      '$this->apellidoCliente',
                                                                      '$this->telefonoCliente')";  
                               mysqli_query($fun, $insertar);
                               echo "<script> alert('El Cliente fue Creado en el Sistema')</script>";

                        }    
                    }


                    function modificar(){

                        $c= new Conexion();
                        $fun=$c->conectar();
                        $p = "select * from cliente where codigoCliente = '$this->codigoCliente'";
                        $r1 = mysqli_query($fun, $p);
                        if(mysqli_fetch_array($r1)){
                                    echo "<script> alert ('El Cliente se modifico  en el Sistema')</script>";
                        }else{
                            $p = "update cliente 
                            set codigoCliente ='$this->codigoCliente', 
                            nombreCliente ='$this->nombreCliente', 
                            apellidoCliente ='$this->apellidoCliente', 
                            telefonoCliente ='$this->telefonoCliente', 
                            where codigoCliente ='$this->codigoCliente'";  /* 46  - 51 asigna datos nuevos
                                 , asigna idcliente  -> lo que se inserto en el formulario $this
                              where  verifica que se cumpla   la condicion
                                 */
                                $r1 = mysqli_query($fun, $p);
                                echo "<script> alert('El cliente fue Modificado')</script>";
                        }



                    }
                    
                    
                    function eliminar(){

                        $c= new Conexion();
                        $fun=$c->conectar();
                        $p = " delete  from cliente where codigoCliente ='$this->codigoCliente'";
                        $r1 = mysqli_query($fun, $p);
                        if($row = mysqli_query($fun, $p)){
                         
                            echo "<script> alert('El cliente fue eliminado')</script>";
                        }
                        else {
                            echo "Error borrando cliente: " . mysqli_error($fun);
                        }

                    }

                    function consultar(){
                        $c= new Conexion();
                        $fun=$c->conectar();
                        $p = "select * from cliente where codigoCliente = '$this->codigoCliente'";
                        $r1 = mysqli_query($fun, $p);
                        if($row = mysqli_fetch_array($r1)){
                                        $this->codigoCliente = $row['codigoCliente'];
                                        $this->nombreCliente=$row['nombreCliente'];
                                        $this->apellidoCliente=$row['apellidoCliente'];
                                        $this->telefonoCliente=$row['telefonoCliente'];
                                        
                        }

                    }

      }  

?>