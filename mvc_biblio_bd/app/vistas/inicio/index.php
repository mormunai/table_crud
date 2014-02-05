<div id="inicio" class="transparente">
    <h2 id="titulo_inicio_index" class="titulo_seccion"><?php echo \core\Idioma::text("inicio_index_titulo", "plantilla"); ?></h2>
    <p>
        <?php echo \core\Idioma::text("inicio_index_parrafo", "plantilla"); ?>
        <br/>
    </p>
    <div id="enlace_libros">
        <a id="a_enlace_libros" 
           href="<?php echo \core\URL::generar_sin_idioma("libros/index"); ?>" class="enlace_pie">
        </a>
    </div>
</div>