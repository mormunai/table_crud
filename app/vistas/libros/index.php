<form id='post_request_form' action='' method='post'>
    <input name='id' id='id' type='hidden' />
</form>

<div id='libros'>
    <h2 id="titulo_libros_index" class="titulo_seccion">
        Mis últimos libros leidos
    </h2>
    <table id="tabla_index">
        <thead>
            <tr id="tr_head">
                <th>Título</th>
                <th>Autor</th>
                <th>Fecha lanzamiento</th>
                <th>Género</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $class;
            foreach ($datos['values'] as $id => $libro) {
                $uri = \core\URL::http_generar(array("libros", "form_modificar", $id));
                if ($id % 2 == 0) {
                    $class = 'tr_par';
                } else {
                    $class = 'tr_impar';
                }
                echo
                    "<tr class='" . $class . "'>
                        <td>{$libro['titulo']}</td>
                        <td>{$libro['autor']}</td>
                        <td>".  \core\Conversiones::fecha_hora_mysql_a_es($libro['fecha_lanzamiento'])."</td>
                        <td>{$libro['genero']}</td>
                        <td>".  \core\Conversiones::decimal_punto_a_coma($libro['precio'])." €</td>
                        <td>
                            <img class='icono_tabla' src='" . URL_ROOT . "recursos/imagenes/generales/modify.png' alt='Modificar'>
                            ".\core\HTML_Tag::a_boton_onclick('enlace_form', array('libros', 'form_modificar', $libro['id']), 'Modificar')."
                            <br/><br/>
                            <img class='icono_tabla' src='" . URL_ROOT . "recursos/imagenes/generales/erase.png' alt='Eliminar'>
                            ".\core\HTML_Tag::a_boton_onclick('enlace_form', array('libros', 'form_eliminar', $libro['id']), 'Eliminar')."
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <?php
            $class == 'tr_impar' ? $class = 'tr_par' : $class = 'tr_impar';
                echo
                '<tr>
                        <td id="td_anexar" colspan="6" class="'.$class.'">
                            <a href="' . \core\URL::generar_sin_idioma("libros/form_anexar") . '" class="enlace_form" onclick="">
                                <img class="icono" src="' . URL_ROOT . 'recursos/imagenes/generales/create.png" alt="Anexar">
                                Anexar un nuevo libro
                            </a>
                        </td>
                    </tr>';
            ?>
        </tfoot>

    </table>
</div>