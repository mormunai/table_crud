<?php
$id = \core\HTTP_Requerimiento::request("id");
$titulo = $datos["values"]["titulo"];
$autor = $datos["values"]["autor"];
$genero = $datos["values"]["genero"];
?>

<!DOCTYPE HTML>
<h2 id="titulo_libros_form_modificar" class="titulo_seccion">
    Datos del libro a modificar
</h2>
<form id='form_modificar' class='form' name='form_modificar' method='post' 
      action='<?php echo \core\URL::generar_sin_idioma("libros/form_modificar_validar").$id; ?>'/>
    <label class="etiqueta">Título:&nbsp;&nbsp; </label>
    <input type='text' id='titulo' name='titulo' size='56'
               value='<?php echo $titulo; ?>'/>
    <br/>
    <?php echo core\HTML_Tag::span_error("titulo", $datos); ?>
    <br/><br/>
    <label class="etiqueta">Autor:&nbsp;&nbsp; </label>
    <input type='text' id='autor' name='autor' size='56'
              value='<?php echo $autor; ?>'/>
    <br/>
    <?php echo core\HTML_Tag::span_error("autor", $datos); ?>
    <br/><br/>
    <label class="etiqueta">Género:&nbsp;&nbsp; </label>
    <input type='text'  id='genero' name='genero' size='50'
                   value='<?php echo $genero; ?>'/>
    <br/>
    <?php echo core\HTML_Tag::span_error("comentario", $datos); ?>
    <br/><br/>
    
    <div class="botones_form">
        <button type='submit' class="boton_icono">
            <img src="<?php echo URL_ROOT; ?>recursos/imagenes/generales/yes.png"
                 alt="Aceptar" 
                 title="Aceptar" 
                 class="img_boton_form">Aceptar
        </button>
        <button type='button' class="boton_icono" 
                onclick="window.location.assign('<?php echo \core\URL::generar_sin_idioma("libros/index"); ?>');">
            <img src="<?php echo URL_ROOT; ?>recursos/imagenes/generales/no.png"
                 alt="Cancelar" 
                 title="Cancelar" 
                 class="img_boton_form">Cancelar
        </button>
    </div>
    
</form>

<script type='text/javascript'>
        document.form_modificar.titulo.focus();
</script>