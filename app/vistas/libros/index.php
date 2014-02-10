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
            /*
              for ($i = 0; $i < count($datos['libros']); $i++) {

              echo "<tr>
              <td>{$datos['libros'][$i]['titulo']}</td>
              <td>{$datos['libros'][$i]['autor']}</td>
              <td>{$datos['libros'][$i]['genero']}</td>
              </tr>";
              }
             */
            $boolean_par;
            $class;
            foreach ($datos['values'] as $id => $libro) {
                $uri = \core\URL::http_generar(array("libros", "form_modificar", $id));
                if ($id % 2 == 0) {
                    $class = 'tr_par';
                    $boolean_par = true;
                } else {
                    $class = 'tr_impar';
                    $boolean_par = false;
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
            if ($boolean_par) {
                echo
                '<tr>
                        <td id="td_anexar" colspan="6" class="tr_impar">
                            <a href="' . \core\URL::generar_sin_idioma("libros/form_anexar") . '" class="enlace_form" onclick="">
                                <img class="icono" src="' . URL_ROOT . 'recursos/imagenes/generales/create.png" alt="Anexar">
                                Anexar un nuevo libro
                            </a>
                        </td>
                    </tr>';
            } else {
                echo
                '<tr>
                        <td id="td_anexar" colspan="6" class="tr_par">
                            <a href="' . \core\URL::generar_sin_idioma("libros/form_anexar") . '" class="enlace_form">
                                <img class="icono" src="' . URL_ROOT . 'recursos/imagenes/generales/create.png" alt="Anexar">
                                Anexar un nuevo libro
                            </a>
                        </td>
                    </tr>';
            }
            ?>
        </tfoot>

    </table>
</div>