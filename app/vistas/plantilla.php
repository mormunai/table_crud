<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo TITULO; ?></title>
        <meta name="Description" content="Explicaci�n de la p�gina" /> 
        <meta name="Keywords" content="palabras en castellano e ingles separadas por comas" /> 
        <meta name="Generator" content="con qu� se ha hecho" /> 
        <meta name="Origen" content="Qu�en lo ha hecho" /> 
        <meta name="Author" content="nombre del autor" /> 
        <meta name="Locality" content="Madrid, Espa�a" /> 
        <meta name="Lang" content="es" /> 
        <meta name="Viewport" content="maximum-scale=10.0" /> 
        <meta name="revisit-after" content="1 days" /> 
        <meta name="robots" content="INDEX,FOLLOW,NOODP" /> 
        <meta http-equiv="Content-Type" content="text/html;charset=utf8" /> 

        <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <link href="favicon.ico" rel="icon" type="image/x-icon" /> 

        <link rel="stylesheet" type="text/css" href="<?php echo URL_ROOT; ?>recursos/css/inicio.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo URL_ROOT; ?>recursos/css/<?php echo \core\Distribuidor::get_controlador_instanciado(); ?>.css"/>

        <style type="text/css" >
            /* Definiciones hoja de estilos interna */
        </style>

<!--        <script type="text/javascript" src="<?php echo URL_ROOT; ?>recursos/js/idiomas.js"></script>
        <script type="text/javascript" src="<?php echo URL_ROOT; ?>recursos/js/f_cookies_v06.js"></script>-->
        <script type="text/javascript" src="<?php echo URL_ROOT; ?>recursos/js/general.js"/></script>
        <script type="text/javascript" src="<?php echo URL_ROOT; ?>recursos/js/jquery/jquery-1.10.2.min.js"/></script>
        
        <script type="text/javascript" >
            /**
             * Envía una petición por post para ocultar parámetros a usuario y evitar que juegue con
             * ellos modificando la URI mostrada .
             * 
             * @param string action
             * @param strin id
             * @returns {undefined}
             */
            function submit_post_request_form(action, id) {
                $("#post_request_form").attr("action", action);
                $("#id").attr("value", id);
                $("#post_request_form").submit();
                // alert("post_request_form.submit("+$("#post_request_form").attr("action")+" , "+$("#id").val()+")");
            }
        </script>
    </head>

    <body>
        <!-- Contenido que se visualizará en el navegador, organizado con la ayuda de etiquetas html -->

        <!-- Cabecera -->
        <div id="cabecera" class="transparente">
            <table id="tabla_cabecera">
                <tr>
                    <td id="td_inicio_tabla_cabecera">
                        <h1 class="titulo_cabecera">
                            <a id="enlace_cabecera_inicio" href="<?php echo \core\URL::generar_sin_idioma("inicio/index"); ?>" 
                               class="enlace_cabecera, titulo_cabecera">Inicio</a>
                        </h1>
                    </td>                    
                    <td id="td_libros_tabla_cabecera">
                        <h1 class="titulo_cabecera">
                            <a id="enlace_cabecera_libros" href="<?php echo \core\URL::generar_sin_idioma("libros/index"); ?>" 
                               class="enlace_cabecera, titulo_cabecera">Libros</a>
                        </h1>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Cuerpo -->
        <div id="view_content">
            <!-- Código PHP que gestiona la aparición dinámica del contenido -->
            <?php
            echo $datos['view_content'];
            ?>
        </div>

        <!-- Pie de página -->
        <div id="pie_pagina" class="transparente">
            <p id="info_pie">
                Página creada por: <span class="cursiva"> Aída Morillas Muñoz</span>
                <br/><br/>
                Contacto: 
                <a href="mailto:aida.morillas.92@gmail.com" id="enlace_contacto" class="enlace_pie">
                    <img class='icono' src='<?php echo URL_ROOT; ?>recursos/imagenes/generales/message.png' title='e-mail' alt="e-mail">
                </a>
                <br/><br/>
                ::: Esta página es una práctica para el módulo de DWES - 09/02/2014 :::
                <br/>
                <br/>
                <?php
                if (\core\Distribuidor::get_controlador_instanciado() != "inicio") {
                    echo '
                        <button id="boton_volver_principal" onclick="window.location.assign(\'' . \core\URL::generar_sin_idioma("inicio") . '\');"                        
                            title="Volver a inicio">
                            <img src="' . URL_ROOT . 'recursos/imagenes/generales/home.png" 
                                alt="Volver al inicio">                                    
                        </button> 
                    ';
                }
                ?>
            </p>            
        </div>

    </body>

</html>
