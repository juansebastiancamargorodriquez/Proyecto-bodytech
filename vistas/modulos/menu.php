<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

			<?php

			foreach ($_SESSION["perfiles"] as $key => $value){

		// Administrador : puede ver y hacer los cambios que el desee en el programa ;			

			if($value["perfil"]=='Administrador'){ 		

					echo '<li class="treeview">
							<li>
								<a href="#"
								<i class=""
								<span>MODULOS</span>
								</a>
							</li>
								<li class="active">	
									<a href="inicio">
										<i class="fa fa-home"></i>
											<span>Inicio</span>
									</a>	
								</li>
									<li class="active">
										<a href="usuarios">
											<i class="fa fa-address-book"></i>
												<span>usuarios</span>
										</a>
										</li>
									<li class="active">
										<a href="productos">
											<i class="fa fa-lock"></i>
												<span>Productos</span>
										</a>	
																			
						</li>';
				}

		// Tecnologia : vistas activos fijos en el area de tecnologia ;
	 
				if($value["perfil"]=='usuarios'){ ?>

				<li class="treeview">
								<li>
									<a href="inicio">
										<i class="fa fa-address-book"></i>
											<span>Inicio</span>
									</a>
								
				</li>			
				<?php 
			}

				
	        }
        	?>

			
		</ul>

	 </section>

</aside>