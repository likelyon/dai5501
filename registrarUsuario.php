<?php
   
session_start();

include_once __DIR__."/controller/UsuarioController.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["email"]) && isset($_POST["clave"]) &&  isset($_POST["confirmacion"])) {

       $exito = UsuarioController::registrarUsuario($_POST["email"], $_POST["clave"], $_POST["confirmacion"]);
       
       if($exito) {
           header("location: index.php");
           return;
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
                <h1>Registrar Usuario</h1>
            </header>
            <div id="contenido">
                <div class="formulario">
                    <form action="registrarUsuario.php" method="POST">
                        <fieldset>
                            <legend>Datos del usuario</legend>
                            <div class="campo">
                                <label>E-Mail</label>
                                <input type="email" name="email" required />
                            </div>
                            <div class="campo">
                                <label>Clave</label>
                                <input type="password" name="clave" required />
                            </div>    
                            <div class="campo">
                                <label>Confirmar Clave</label>
                                <input type="password" name="confirmacion" required />
                            </div>   
                        </fieldset>
                        <div class="botonera">
                            <input type="submit" name="enviar" value="Registrar" />
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
