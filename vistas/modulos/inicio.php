<?php

$Now = date('Y-m-d');

$hora =date('H:i:s');

?>

<div class="content-wrapper" >

  <section class="content-header">
    
   <center><h1 >
      Gimnasio body
    </h1></center>

    <ol class="breadcrumb">
      
      <li><a href="inicio" style="background-color: yellow" class="fa fa-dashboard" ></i>Inicio</a></li>
      
      <li class="active">Tablero</li>
    
    </ol>

  </section>
  

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->

    <div class="box">
      <div class="box-header with-border">
       <center><h3 class="box-title">BIENVENIDO AL MEJOR GIMNASIO DE LA HISTORIA</h3></center>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>


      <div class="box-body">
        <center><div class="col-md-4">
        <div class="small-box bg-primary" >
            <div class="inner">
              <center><h3>TICKET</h3></center>

                <?php

            echo ' Dia de llegada  :</br><li>'.$Now.'</br>';

            echo '</br>Hora de entrada  :  <li>'.$hora.'</br>';

            echo '</br> Su nombre es  :  <li>'.$_SESSION["nombre"].'</li>';          
        ?>
            </div>
            <div class="icon">
              <a href="cronograma"><i class="fa fa-shopping-cart"></i></a>
            </div>
            <a href="cronograma" class="small-box-footer">
              PRODUCTOS<i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
          </div></center>
        </div>
      </div>
    </section>
  </div></center>




        

     

    

   