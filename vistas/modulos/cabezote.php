  <header class="main-header">
 	
	<!--=====================================
	LOGOTIPO
	======================================-->
	<a href="inicio" class="logo">
		
		<!-- logo mini -->
		<span class="logo-mini"><img src="vistas/img/plantilla/2.jpg" class="img-responsive" style="padding:15px 0px 0px 0px"></span>

		<!-- logo normal -->
		
		<span class="logo-lg"><img src="vistas/img/plantilla/2.jpg" height="100" width="100" class="img-responsive" style="padding:15px 0px 0px 0px"></span>

	</a>

	<!--=====================================
	BARRA DE NAVEGACIÓN
	======================================-->
	<nav class="navbar navbar-static-top" role="navigation">
		
		<!-- Botón de navegación -->

	 	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        	
        	<span class="sr-only">Barra de navegación</span>
      	
      	</a>

		<!-- perfil de usuario -->

		<div class="navbar-custom-menu">
				
			<ul class="nav navbar-nav">

				<li class="dropdown user user-menu">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

						
						<span class="hidden-xs"><?php  echo $_SESSION["nombre"]; ?></span>

					</a>
		            <ul class="dropdown-menu">
		              <!-- User image -->
		              <li class="user-header">

		                <p>
		                  <small>Nombre : <?php  echo $_SESSION["nombre"]; ?></small>	

		                  <small>Usuario : <?php  echo $_SESSION["usuario"]; ?></small>

		                  <small>Correo : <?php  echo $_SESSION["mail"]; ?></small>
		                </p>

		              </li>
		              
		              <!-- Menu Footer-->

		              <li class="user-footer">
		                <div class="pull-left">
		                	<button type="button" class="btn btn-warning btn-flat btnEditarUsuarioPropio" Usuario="<?php echo $_SESSION["usuario"];?>" data-toggle="modal" data-target="#modalEditarUsuarioPropio">EDITAR</button>
		                </div>
		                <div class="pull-right">
		                 <button class="btn btn-danger "><a href="salir" class="btn-flat" style="color: white">CERRAR SESIÓN</a></button>
		                </div>
		              </li>
		            </ul>
		          </li>

			</ul>

		</div>

	</nav>

 </header>

 <div id="modalEditarUsuarioPropio" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    	<form role="form" method="post" enctype="multipart/form-data">
	        <div class="modal-header" style="background:#3c8dbc; color:white">

	          <button type="button" class="close" data-dismiss="modal">&times;</button>

	          <h4 class="modal-title">Editar usuario  <?php  echo '</br>Nombre del usuario : '.$_SESSION["nombre"]; ?></h4>

	        </div>

  	        <div class="modal-body">

	          <div class="box-body">

	          	<div class="form-group">
              
	              <div class="input-group">
	              
	                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

	                <input type="text" class="form-control input-lg" id="editarUsuarioPropio" name="editarUsuarioPropio" value="" readonly>

	              </div>

	            </div>

	            <!-- ENTRADA PARA EL NOMBRE -->
	            
	            <div class="form-group">
	              
	              <div class="input-group">
	              
	                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

	                <input type="text" class="form-control input-lg" id="editarNombreUsuario" name="editarNombreUsuario" placeholder="Nombre del usuario" value="" required>

	              </div>

	            </div>

	            <!-- ENTRADA PARA EL CORREO -->

	             <div class="form-group">
	              
	              <div class="input-group">
	              
	                <span class="input-group-addon"><i class="fa fa-at"></i></span> 

	                <input type="email" class="form-control input-lg" placeholder="Correo del usuario" name="editarCorreoPropio"  id="editarCorreoPropio" required>

	              </div>

	            </div>
	       
	     	     <!-- ENTRADA PARA LA CONTRASEÑA -->

	             <div class="form-group">
	              
	              <div class="input-group">
	              
	                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

	                <input type="password" class="form-control input-lg" name="editarPasswordUsuario" placeholder="Escriba la nueva contraseña">

	                <input type="hidden" id="passwordActualUsuario" name="passwordActualUsuario">

	              </div>

	            </div>


	          </div>

	        </div>
	        <div class="modal-footer">

	          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">SALIR</button>

	          <button type="submit" class="btn btn-primary">ACTUALIZAR</button>

	        </div>

	     <?php

	          $editarUsuario = new ControladorUsuarios();
	          $editarUsuario -> ctrEditarUsuarioPropio();

	        ?> 
    	</form>
      
    </div>

  </div>

</div>

<script type="text/javascript">
  $("document").ready(function () {

  	var mail = '<?php echo $_SESSION["mail"]; ?>';

  	if(mail.length<=0){
  		alert('Usted no posee e-mail registrado, por favor registrarlo por la opcion de editar (Dar clic en la esquina superior derecha en su nombre, luego editar...), luego de registrar el e-mail, debe salir del sistema y volver a ingresar.');
  	}	
  });
</script>