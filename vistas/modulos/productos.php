
<div class="content-wrapper" >

  <section class="content-header">
    
   <center><button  style="background-color:#FFC300;color:black" class="btn btn-lg  btn-warning disabled fa fa-user-circle-o" >
      
     PRODUCTOS DEL MEJOR GIMNASIO
    
    </button></center>

    <ol class="breadcrumb">
      
      <li><a href="inicio" style="background-color:#FFC300"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar productos</li>
    
    </ol>

  </section>

   <section class="content">

    <div class="box" >

      <div class="box-header with-border">
  
        <button class="btn btn-primary fa fa-save"  data-toggle="modal" data-target="#modalAgregarProducto">
          
         productos

        </button>

      </div>

      <div class="box-body">        
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr class="bg-primary">
           
           <th style="width:10px">Id</th>           
           <th>NOMBRE</th>
           <th>DESCRIPCION</th>
           <th>PRECIO</th>
           <th>Acciones</th>

          </tr> 

        </thead>

        <tbody>

        <?php

        $hora =date('H:i a');

        $item = null;

        $valor = null;

        $vehiculo = ControladorVehiculo::ctrMostrarVehiculo($item, $valor);       


       foreach ($vehiculo as $key => $value){
         
          echo ' <tr>
                  <td>'.$value["id_vehiculo"].'</td>
                  <td>'.$value["nombre"].'</td>
                   <td>'.$value["modelo"].'</td>
                  <td>'.$value["marca"].'</td>
                  <td>'.$value["placa"].'</td>
                  <td>'.$value["tiempo"].'</td>
                  <td>'.$value["valor_total"].'</td>';               

          

                  echo '<td>

                    <div class="btn-group">

                   <button class="btn-success btn btn-success  btnFactura" id_vehiculo="'.$value["id_vehiculo"].'" data-toggle="modal" data-target="#modaleDITARrProducto"><i class="fa fa-edit"></i> EDITAR</button>
                   <hr>
                        
                      <button class="btn btn-danger btnEliminarVehiculo" id_vehiculo="'.$value["id_vehiculo"].'" Nombre="'.$value["nombre"].'" placa="'.$value["placa"].'"><i class="fa fa-trash-o"></i> ELIMINAR</button>



                    </div>  

                  </td>

                </tr>';
        }


        ?> 

        </tbody>

<!--=====================================
MODAL EDITAR VEHICULO
======================================-->

<div id="modaleDITARrProducto" class="modal fade" role="dialog" style="overflow-y: scroll">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:gray; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

         <center><h4 class="modal-title">EDITAR VEHICULO</h4></center>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarnombre" id="editarnombre" placeholder="NOMBRE">
                <input type="hidden" id="editarvehiculos" name ="editarvehiculos" value="">

              </div>

            </div>

            <!-- ENTRADA PARA LA DESCRIPCION -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="text" class="form-control input-lg" name="editarmodelo" placeholder="descripcion" id="editarmodelo">

              </div>

            </div>

           <!-- ENTRADA PARA EL PRECIO -->

           <div class="form-group">

           	<div class="input-group">

           		<span class="input-group-addon"><i class="fa fa-microchip"></i></span> 

           		<input type="text" class="form-control input-lg" name="editarprecio" id="editarprecio" placeholder="precio">           		
           	</div>
           	
           </div> 	

           <!--=====================================
        Botones para el final del modal
        ======================================--> 

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">SALIR</button>

          <button type="submit" class="btn-lg btn-primary"> EDITAR VEHICULO</button>

        </div>

        <?php

          $editarVehiculo = new ControladorVehiculo();
          $editarVehiculo -> ctrEditarVehiculo();

        ?>

      </form>

    </div>

  </div>

</div>


       </table>

        </div>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL EDITAR VEHICULO
======================================-->

<div id="modalAgregarProducto" class="modal fade" role="dialog" style="overflow-y: scroll">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:gray; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

         <center><h4 class="modal-title">AGREGAR PRODUCTO</h4></center>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA DESCRIPCION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevonombre" id="nuevonombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA la descripcion -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevodescripcion" placeholder="Ingresar descripcion" id="nuevodescripcion" required>

              </div>

            </div>

           <!-- ENTRADA PARA EL PRECIO-->

           <div class="form-group">

           	<div class="input-group">

           		<span class="input-group-addon"><i class="fa fa-microchip"></i></span> 

           		<input type="tex" class="form-control input-lg" name="nuevoprecio" id="nuevoprecio" placeholder="Ingresar precio" requiredN>           		
           	</div>
           	
           </div> 	

           <!--=====================================
        Botones para el final del modal
        ======================================--> 

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">SALIR</button>

          <button type="submit" class="btn btn-primary">GUARDAR PRODUCTO</button>

        </div>

        <?php

          $crearVehiculo = new ControladorVehiculo();
          $crearVehiculo -> ctrCrearVehiculo();

        ?>

      </form>

    </div>

  </div>

</div>
<?php
  
  $borra = new ControladorVehiculo();
  $borra->ctrBorrarVehiculo(); 

?>


