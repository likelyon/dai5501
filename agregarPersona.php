<?php
   
session_start();

include_once __DIR__."/controller/PersonaController.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["rut"]) && isset($_POST["nombre"]) && 
       isset($_POST["apellido"]) && isset($_POST["fechaNacimiento"]) &&
       isset($_POST["email"])) {

       $exito = PersonaController::registrarPersona($_POST["rut"], 
                                                    $_POST["nombre"], 
                                                    $_POST["apellido"], 
                                                    $_POST["fechaNacimiento"], 
                                                    $_POST["email"]);
       
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
                <h1>Registrar Persona</h1>
            </header>
            <div id="contenido">
                <div class="formulario">
                    <form action="agregarPersona.php" method="POST">
                        <fieldset>
                            <legend>Datos de la Persona</legend>
                            <div class="campo">
                                <label>RUT</label>
                                <input type="text" name="rut" required />
                            </div>
                            <div class="campo">
                                <label>Nombre</label>
                                <input type="text" name="nombre" required />
                            </div>
                            <div class="campo">
                                <label>Apellido</label>
                                <input type="text" name="apellido" required />
                            </div>
                            <div class="campo">
                                <label>Fecha Nacimiento</label>
                                <input type="date" name="fechaNacimiento" required />
                            </div>
                            <div class="campo">
                                <label>E-Mail</label>
                                <input type="email" name="email" required />
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
         <footer>
                <p>Diseño de Aplicaciones para Internet</p>
         </footer>
    </body>
</html>
