<?php
   
session_start();

include_once __DIR__."/controller/UsuarioController.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["email"]) && isset($_POST["clave"])) {

       $exito = UsuarioController::validarUsuarioClave($_POST["email"], $_POST["clave"]);
       
       if($exito) {
           header("location: index.php");
           return;
       } else {
           $errorMessage = "usuario o clave incorrectos";
       }
    }  
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div id="contenedor">
            <header>
                <h1>Iniciar Sesión</h1>
            </header>
            <div id="contenido">
                <div class="formulario">
                    <form action="iniciarSesion.php" method="POST">
                        <fieldset>
                            <legend>Login</legend>
                            <div class="campo">
                                <label>E-Mail</label>
                                <input type="email" name="email" required />
                            </div>
                            <div class="campo">
                                <label>Clave</label>
                                <input type="password" name="clave" required />
                            </div>      
                        </fieldset>
                        <div class="botonera">
                            <input type="submit" name="enviar" value="Acceder" />
                        </div>
                    </form>
                </div>
                <ul>
                    <li>
                        <a href="index.php">Inicio</a>
                    </li>
                </ul>
            </div>
            <footer>
                <p>Diseño de Aplicaciones para Internet</p>
                <?php
                    if(isset($_SESSION["usuario"])) {
                        echo '<p><b>Usuario autenticado</b>: '.$_SESSION["usuario"].'</p>';
                    }
                ?>
            </footer>
        </div>
    </body>
</html>
