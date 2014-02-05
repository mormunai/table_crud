<form id='post_request_form' action='' method='post'>
        <input name='id' id='id' type='hidden' />
</form>

<div id='libros'>
    <h2 id="titulo_libros_index" class="titulo_seccion">
        <?php echo \core\Idioma::text("libros_index_titulo", "plantilla"); ?>
    </h2>
    <table id="tabla_index">
        <thead>
            <tr id="tr_head">
                <th><?php echo \core\Idioma::text("libros_titulo", "plantilla"); ?></th>
                <th><?php echo \core\Idioma::text("libros_autor", "plantilla"); ?></th>
                <!--<th><?php // echo \core\Idioma::text("libros_comentario", "plantilla"); ?></th>-->
                <th>Género</th>
                <th><?php echo \core\Idioma::text("libros_acciones", "plantilla"); ?></th>
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
            foreach ($datos['values'] as $id => $libro) {
                $uri = \core\URL::http_generar(array("libros", "form_modificar", $id));
                if ($id % 2 == 0) {
                    echo
                    "<tr class='tr_par'>
                            <td>{$libro['titulo']}</td>
                            <td>{$libro['autor']}</td>
                            <td>{$libro['genero']}</td>
                            <td>
                                <a href='".\core\URL::generar_sin_idioma('libros/form_modificar')."$id' class='enlace_form'>
                                    <img class='icono_tabla' src='".URL_ROOT."recursos/imagenes/generales/modify.png' alt='".\core\Idioma::text("libros_boton_modificar", "plantilla")."'>
                                    ".\core\Idioma::text("libros_boton_modificar", "plantilla")."
                                </a> 
                                <br/><br/>
                                <a href='".\core\URL::generar_sin_idioma('libros/form_eliminar')."$id' class='enlace_form'>
                                    <img class='icono_tabla' src='".URL_ROOT."recursos/imagenes/generales/erase.png' alt='".\core\Idioma::text("libros_boton_eliminar", "plantilla")."'>
                                    ".\core\Idioma::text("libros_boton_eliminar", "plantilla")."
                                </a>
                            </td>
                        </tr>";
                    $boolean_par = true;
                } else {
                    echo
                    "<tr class='tr_impar'>
                            <td>{$libro['titulo']}</td>
                            <td>{$libro['autor']}</td>
                            <td>{$libro['genero']}</td>
                            <td>
                                <a href='".\core\URL::generar_sin_idioma('libros/form_modificar')."$id' class='enlace_form'>
                                    <img class='icono_tabla' src='".URL_ROOT."recursos/imagenes/generales/modify.png' alt='".\core\Idioma::text("libros_boton_modificar", "plantilla")."'>
                                    ".\core\Idioma::text("libros_boton_modificar", "plantilla")."
                                </a> 
                                <br/><br/>
                                <a href='".\core\URL::generar_sin_idioma('libros/form_eliminar')."$id' class='enlace_form'>
                                    <img class='icono_tabla' src='".URL_ROOT."recursos/imagenes/generales/erase.png' alt='".\core\Idioma::text("libros_boton_eliminar", "plantilla")."'>
                                    ".\core\Idioma::text("libros_boton_eliminar", "plantilla")."
                                </a>
                            </td>
                        </tr>";
                    $boolean_par = false;
                }
            }
            ?>
        </tbody>
        <tfoot>
            <?php
            if ($boolean_par) {
                echo
                    '<tr>
                        <td id="td_anexar" colspan="4" class="tr_impar">
                            <a href="'.\core\URL::generar_sin_idioma("libros/form_anexar").'" class="enlace_form" onclick="">
                                <img class="icono" src="'.URL_ROOT.'recursos/imagenes/generales/create.png" alt="crear">
                                '.\core\Idioma::text("libros_boton_anexar", "plantilla").'
                            </a>
                        </td>
                    </tr>';
            } else {
                echo
                    '<tr>
                        <td id="td_anexar" colspan="4" class="tr_par">
                            <a href="'.\core\URL::generar_sin_idioma("libros/form_anexar").'" class="enlace_form">
                                <img class="icono" src="'.URL_ROOT.'recursos/imagenes/generales/create.png" alt="crear">
                                '.\core\Idioma::text("libros_boton_anexar", "plantilla").'
                            </a>
                        </td>
                    </tr>';
            }            
            ?>
        </tfoot>

    </table>
</div>