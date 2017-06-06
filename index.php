<?php
   
    session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div id="contenido">
        <header>
				<div id="titulo">
					<h1>Nuevo Título - Administrador de Cumpleaños</h1>
					<h3>DUOC UC - Grupo A - Seccion 003v</h3>
				</div>
				<div id="logo-empresa">
					<img alt="logo empresa" src="logo.png"  />
				</div>
			</header>
        	<div id="login">
                <form action="#" method="POST">
				<div id="formulario">
					<fieldset>
						<legend>Autenticación</legend>
                                                
                                                 <ul>
            <li>
                <a href="index.php">Inicio</a>
            </li>
            <li>
                <a href="listarPersonas.php">Listar personas</a>
            </li>
            <li>
                <a href="agregarPersona.php">Agregar persona</a>
            </li>
            <li>
                <a href="registrarUsuario.php">Registrar Usuario</a>
            </li>
            <li>
                <a href="iniciarSesion.php">Login</a>
            </li>
            <li>
                <a href="cerrarSesion.php">Logout</a>
            </li>
        </ul> 				
						
	</fieldset>
					
	<input type="submit" name="entrar"< value="Entrar" />
	<input type="button" name="salir" value="Salir" />
				</div>	
                </form>
           
       
        
        <?php
            if(isset($_SESSION["usuario"])) {
                echo '<p><b>Usuario autenticado</b>: '.$_SESSION["usuario"].'</p>';
            }
        ?>
                     </div>
            </div>
          <footer>
                <p>Diseño de Aplicaciones para Internet</p>
            </footer>
    </body>
    
    
</html>
