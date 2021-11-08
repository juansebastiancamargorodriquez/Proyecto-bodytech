<div id="back"></div>

<div class="login-box">
  
  <div class="login-logo">

  </div>

  <div class="login-box-body" >

    <img src="vistas/img/plantilla/2.jpg" class="img-responsive"/>

    
    <b><p class="login-box-msg">BODYTECH</p></b>

    <form method="post">

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="Ingresar su usuario" name="ingUsuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" placeholder="Ingresar la contraseña" name="ingPassword" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      
      </div>

      <div >
       
        <div >

          <center><button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button></center>
        
        </div>

      </div>

      <?php

        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
        
      ?>

    </form>

    <hr>
    <font face="arial" size="3" >Derechos reservados © 2021 Bodytech</font>     
    
 <!--
  </div>
  <br>
  <b><center>Realizar Test Velocidad <a href="https://www.speedtest.net/es" target="_blank">Aqui</a></center></b>
</div>
 -->






 