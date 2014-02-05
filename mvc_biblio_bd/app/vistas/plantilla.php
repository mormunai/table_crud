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
        <meta name="Lang" content="<?php echo \core\Idioma::get(); ?>" /> 
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

        <script type="text/javascript" src="<?php echo URL_ROOT; ?>recursos/js/idiomas.js"></script>
        <script type="text/javascript" src="<?php echo URL_ROOT; ?>recursos/js/f_cookies_v06.js"></script>

    </head>

    <body>
        <!-- Contenido que se visualizará en el navegador, organizado con la ayuda de etiquetas html -->

        <!-- Cabecera -->
        <div id="cabecera" class="transparente">
            <table id="tabla_cabecera">
                <tr>
                    <td id="td_titulo_tabla_cabecera">
                        <h1 id="titulo_cabecera">
                            <?php
                            if (\core\Distribuidor::get_controlador_instanciado() == "inicio")
                                echo \core\Idioma::text("plantilla_titulo_cabecera", "plantilla");
                            else
                                echo \core\Idioma::text("plantilla_titulo_cabecera_libros", "plantilla");
                            ?>
                        </h1>
                    </td>                    
                    <td id="td_idiomas_tabla_cabecera">
                        <table id="tabla_idiomas">
                            <tr>
                                <td id="td_es_tabla_cabecera" class="td_lang_tabla_cabecera">
                                    <a onclick='set_lang("es", "<?php echo \core\URL::generar_sin_idioma("inicio/index"); ?>");'
                                       id="a_idioma_es" class="enlace_idioma">
                                        <img src='<?php echo \core\URL::generar_sin_idioma("recursos/imagenes/generales"); ?>flag_es.png'
                                             class="icono_idioma"/>
                                        <?php echo \core\Idioma::text("plantilla_español", "plantilla"); ?>
                                    </a>                                    
                                </td>                                    
                            </tr>
                            <tr>
                                <td id="td_en_tabla_cabecera" class="td_lang_tabla_cabecera">
                                    <a onclick='set_lang("en", "<?php echo \core\URL::generar_sin_idioma("en/inicio/index"); ?>");'
                                       id="a_idioma_en" class="enlace_idioma">
                                        <img src='<?php echo \core\URL::generar_sin_idioma("recursos/imagenes/generales"); ?>flag_gb.png' 
                                             class="icono_idioma"/>
                                        <?php echo \core\Idioma::text("plantilla_ingles", "plantilla"); ?>
                                    </a>
                                </td>
                            </tr>
                        </table>
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
                <?php echo \core\Idioma::text("plantilla_creada", "plantilla"); ?> <span class="cursiva">Aída Morillas Muñoz</span>
                <br/><br/>
                <?php echo \core\Idioma::text("plantilla_contacto", "plantilla"); ?> 
                <a href="mailto:aida.morillas.92@gmail.com" id="enlace_contacto" class="enlace_pie">
                    <img class='icono' src='<?php echo URL_ROOT; ?>recursos/imagenes/generales/message.png' title='e-mail' alt="e-mail">                    
                </a>
                <br/><br/>
                ::: <?php echo \core\Idioma::text("plantilla_info", "plantilla"); ?> 19/12/2013 :::
                <br/>
                <br/>
                <?php
                if (\core\Distribuidor::get_controlador_instanciado() != "inicio") {
                    echo '
                        <button id="boton_volver_principal" onclick="window.location.assign(\''.\core\URL::generar_sin_idioma("inicio").'\');"                        
                            title="'.\core\Idioma::text("plantilla_volver", "plantilla").'">
                            <img src="'.URL_ROOT.'recursos/imagenes/generales/home.png" 
                                alt="'.\core\Idioma::text("plantilla_volver", "plantilla").'">                                    
                        </button> 
                    ';
                }
                ?>
            </p>            
        </div>

    </body>

</html>
