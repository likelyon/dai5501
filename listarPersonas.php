<?php
   
    session_start();

    include_once __DIR__."/controller/PersonaController.php";

    $listadoPersonas = PersonaController::listarPersonasRegistradas();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado de Personas</title>
        
        <!-- https://code.jquery.com/jquery-3.2.1.js -->
        <script src="js/jquery-3.2.1.js" ></script>
        
        <!-- https://raw.githubusercontent.com/joaquinnunez/jQuery-Rut-Plugin/master/jquery.Rut.js -->
        <script src="js/jquery.rut.js" ></script>
        <script>
            
            /**
             * Calcula el dígito verificador del rut (mantisa) indicado por parámetro
             * @{link http://blog.continuum.cl/function-jquery-o-no-para-calcular-digito-verificador/ }
             * @param {Number} rut
             * @returns {Number|String}
             */
            function calcularDigitoVerificador(rut) {
                if (!rut || !rut.length || typeof rut !== 'string') {
                    return -1;
                }
                // serie numerica
                var secuencia = [2,3,4,5,6,7,2,3];
                var sum = 0;
                //
                for (var i=rut.length - 1; i >=0; i--) {
                        var d = rut.charAt(i)
                        sum += new Number(d)*secuencia[rut.length - (i + 1)];
                };
                // sum mod 11
                var rest = 11 - (sum % 11);
                // si es 11, retorna 0, sino si es 10 retorna K,
                // en caso contrario retorna el numero
                return rest === 11 ? 0 : rest === 10 ? "K" : rest;
            }
            
            jQuery(document).ready(function(){
                jQuery(".rut").each(function(indice, columna){
                    mantisa = jQuery(columna).html();
                    dv = calcularDigitoVerificador(mantisa);                    
                    rut = jQuery.Rut.formatear(mantisa+dv, true);
                    jQuery(columna).html(rut);
                })
            });
        </script>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>RUT</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha Nacimiento</th>
                    <th>E-Mail</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="5">
                        Listado de personas registradas
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <?php
                    foreach($listadoPersonas as $persona) {
                        /*@var $persona Persona */
                ?>
                <tr>
                    <td class="rut" ><?= $persona->getRut() ?></td>
                    <td><?= $persona->getNombre() ?></td>
                    <td><?= $persona->getApellido() ?></td>
                    <td><?= $persona->getFechaNacimiento() ?></td>
                    <td><?= $persona->getEmail() ?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        
        <ul>
            <li>
                <a href="index.php">Inicio</a>
                <?php
                    if(isset($_SESSION["usuario"])) {
                        echo '<p><b>Usuario autenticado</b>: '.$_SESSION["usuario"].'</p>';
                    }
                ?>
            </li>
        </ul>
          <footer>
                <p>Diseño de Aplicaciones para Internet</p>
         </footer>
    </body>
</html>
