<?php
    $id = \core\HTTP_Requerimiento::post("id");
    $titulo = $datos["values"]["titulo"];
    $autor = $datos["values"]["autor"];
    $fecha = \core\Conversiones::fecha_hora_mysql_a_es($datos["values"]["fecha_lanzamiento"]);
    $genero = $datos["values"]["genero"];
    $precio = \core\Conversiones::decimal_punto_a_coma($datos["values"]["precio"]);
?>

<!DOCTYPE HTML>
<h2 id="titulo_libros_form_eliminar" class="titulo_seccion">
    ¿Está seguro de que desea eliminar este libro?
</h2>
<br/>

<form id='form_eliminar' class='form' name='form_eliminar' method='post'
      action='<?php echo \core\URL::generar_sin_idioma("libros/form_eliminar_validar"); ?>'/>

    <input id='id' name='id' type='hidden' value='<?php echo $id; ?>' />

    <label class="etiqueta">Título:&nbsp;&nbsp; </label>
    <input type='text' id='titulo' name='titulo' size='56' value="<?php echo $titulo; ?>" disabled=""/>
    <br/>
    <?php echo core\HTML_Tag::span_error("titulo", $datos); ?>
    <br/><br/>

    <label class="etiqueta">Autor:&nbsp;&nbsp; </label>
    <input type='text' id='autor' name='autor' size='56' value="<?php echo $autor; ?>" disabled=""/>
    <br/>
    <?php echo core\HTML_Tag::span_error("autor", $datos); ?>
    <br/><br/>

    <label class="etiqueta">Fecha de lanzamiento:&nbsp;&nbsp; </label>
    <input type='date' id='fecha_lanzamiento' name='fecha_lanzamiento' size='56' value="<?php echo $fecha; ?>" disabled=""/>
    <br/>
    <?php echo core\HTML_Tag::span_error("fecha", $datos); ?>
    <br/><br/>

    <label class="etiqueta">Género:&nbsp;&nbsp; </label>
    <input type='text' id='genero' name='genero' size='50' value="<?php echo $genero; ?>" disabled=""/>
    <br/>
    <?php echo core\HTML_Tag::span_error("genero", $datos); ?>
    <br/><br/>

    <label class="etiqueta">Precio:&nbsp;&nbsp; </label>
    <input type='number' id='precio' name='precio' size='56' value="<?php echo $precio; ?>" disabled=""/>&nbsp;€
    <br/>
    <?php echo core\HTML_Tag::span_error("precio", $datos); ?>
    <br/><br/>

    <div class="botones_form">
        <button type='submit' class="boton_icono">
            <img src="<?php echo URL_ROOT; ?>recursos/imagenes/generales/yes.png"
                 alt="Aceptar" 
                 title="Aceptar" 
                 class="img_boton_form">&nbsp;&nbsp;Aceptar
        </button>
        <button type='button' class="boton_icono" 
                onclick="window.location.assign('<?php echo \core\URL::generar_sin_idioma("libros/index"); ?>');">
            <img src="<?php echo URL_ROOT; ?>recursos/imagenes/generales/no.png"
                 alt="Cancelar" 
                 title="Cancelar" 
                 class="img_boton_form">&nbsp;&nbsp;Cancelar
        </button>
    </div>
    
</form>