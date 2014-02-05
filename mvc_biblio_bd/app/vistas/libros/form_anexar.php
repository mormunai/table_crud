<?php
$titulo = $datos["values"]["titulo"];
$autor = $datos["values"]["autor"];
$comentario = $datos["values"]["comentario"];
?>

<!DOCTYPE HTML>
<h2 id="titulo_libros_form_anexar" class="titulo_seccion">
    <?php echo \core\Idioma::text("libros_form_anexar_titulo", "plantilla"); ?>
</h2>

<form id='form_anexar' class='form' name='form_anexar' method='post' 
      action='<?php echo \core\URL::generar_sin_idioma("libros/form_anexar_validar"); ?>'>
    
    <label class="etiqueta"><?php echo \core\Idioma::text("libros_titulo", "plantilla"); ?>:&nbsp;&nbsp; </label>
    <input type='text' id='titulo' name='titulo' size='56' value="<?php echo $titulo; ?>"/>
    <br/>
    <?php echo core\HTML_Tag::span_error("titulo", $datos); ?>
    <br/><br/>
    
    <label class="etiqueta"><?php echo \core\Idioma::text("libros_autor", "plantilla"); ?>:&nbsp;&nbsp; </label>
    <input type='text' id='autor' name='autor' size='56' value="<?php echo $autor; ?>"/>
    <br/>
    <?php echo core\HTML_Tag::span_error("autor", $datos); ?>
    <br/><br/>
    
    <label class="etiqueta"><?php echo \core\Idioma::text("libros_comentario", "plantilla"); ?>: &nbsp;&nbsp;</label>
    <input type='text' id='comentario' name='comentario' size='50' value="<?php echo $comentario; ?>"/>
    <br/>
    <?php echo core\HTML_Tag::span_error("comentario", $datos); ?>
    <br/><br/>
    
    <div class="botones_form">
        <button type='submit' class="boton_icono">
            <img src="<?php echo URL_ROOT; ?>recursos/imagenes/generales/yes.png"
                 alt="<?php echo \core\Idioma::text("libros_boton_aceptar", "plantilla"); ?>" 
                 title="<?php echo \core\Idioma::text("libros_boton_aceptar", "plantilla"); ?>" 
                 class="img_boton_form"> <?php echo \core\Idioma::text("libros_boton_aceptar", "plantilla"); ?>
        </button>
        <button type='button' class="boton_icono" 
                onclick="window.location.assign('<?php echo \core\URL::generar_sin_idioma("libros/index"); ?>');">
            <img src="<?php echo URL_ROOT; ?>recursos/imagenes/generales/no.png"
                 alt="<?php echo \core\Idioma::text("libros_boton_cancelar", "plantilla"); ?>" 
                 title="<?php echo \core\Idioma::text("libros_boton_cancelar", "plantilla"); ?>" 
                 class="img_boton_form"> <?php echo \core\Idioma::text("libros_boton_cancelar", "plantilla"); ?>
        </button>
    </div>
    
</form>
<?php
    echo $_POST['id'];
    echo $_REQUEST['id'];
?>
<script type='text/javascript'>
    document.form_anexar.titulo.focus();
</script>