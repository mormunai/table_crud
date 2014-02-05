<div id="inicio" class="transparente">
    <h2 id="titulo_inicio_index" class="titulo_seccion">Esta es la práctica table_crud de DWES</h2>
    <p>
        En esta página hemos utilizado el modelo vista-controlador (MVC) para organizar el proyecto.
        <br/>
        Además de la función MySQLi de PHP para obtener los datos de la página desde una base de datos.
        <br/>
        En la página principal (actual) podemos encontrar un icono a continuación que nos llevará al apartado LIBROS.
        <br/>
        <br/>
    </p>
    <div id="enlace_libros">
        <a id="a_enlace_libros" 
           href="<?php echo \core\URL::generar_sin_idioma("libros/index"); ?>" class="enlace_pie">
        </a>
    </div>
</div>