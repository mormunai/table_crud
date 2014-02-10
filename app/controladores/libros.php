<?php

namespace controladores;

class libros extends \core\Controlador {

    /**
     * url -> ?menu=libros | /libros/index
     * 
     * Esta función pasa el contenido/los datos para generar la plantilla básica (index)
     * de la sección de libros
     * 
     * @param array $datos -> Es el array que contiene los datos necesarios para generar los contenidos de la web
     * @author Aída Morillas Muñoz (mormunai)
     * 
     */
    public function index(array $datos = array()) {
        //este array contiene las clausulas que utilizaremos para hacer el select en la BD
        $clausulas = array(
            'columnas' => '',
            'where' => '',
            'group_by' => '',
            'having' => '',
            'order_by' => 'titulo'
        );
        
        //seleccionamos todos los libros de nuestra tabla para mostrarlos
        $datos['values'] = \modelos\Datos_SQL::tabla("libros")->select($clausulas);
        
        //generamos la vista
        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
        $http_body = \core\Vista_Plantilla::generar('plantilla', $datos);
        \core\HTTP_Respuesta::enviar($http_body);
    }

    /**
     * url -> ?menu=libros&seccion=form_anexar | /libros/form_anexar
     * 
     * Esta función pasa el contenido/los datos para abrir la plantilla 
     * del formulario para insertar un nuevo libro en la BD
     * 
     * @param array $datos -> Es el array que contiene los datos necesarios para generar los contenidos de la web
     * @author Aída Morillas Muñoz (mormunai)
     */
    public function form_anexar(array $datos = array()) {

        //generamos el índice 'values' en el array $datos ya que nos será necesario en la vista
        $datos["values"] = array(
            "titulo" => "",
            "autor" => "",
            "fecha_lanzamiento" => "",
            "genero" => "",
            "precio" => "");
        
        //generamos la vista
        $datos["view_content"] = \core\Vista::generar(__FUNCTION__, $datos);
        $http_body = \core\Vista_Plantilla::generar("plantilla", $datos);
        \core\HTTP_Respuesta::enviar($http_body);
    }

    /**
     * Este método será llamado cuando el usuario haya pulsado el boton 'submit' del formulario anexar
     * 
     * Se encargará de realizar la comprobación de los datos que ha introducido el usuario son válidos
     * y de que no le faltan datos por introducir.
     * 
     * Si el todos los datos son correctos, validará el formulario e insertará los datos en la BD.
     * Si se produce algún error en la validación se devolverá al usuario al formulario de insertar
     * y se le comunicarán los errores para que los corrija.
     * 
     * @param array $datos -> Es el array que contiene los datos necesarios para generar los contenidos de la web
     * @author Aída Morillas Muñoz (mormunai)
     */
    public function form_anexar_validar(array $datos = array()) {
        
        $validaciones = array(
            "titulo" => "errores_requerido",
            "autor" => "errores_requerido",
            "genero" => "errores_requerido",
            "fecha_lanzamiento" => "errores_fecha_hora && errores_requerido",
            "precio" => "errores_precio && errores_requerido"
        );
                
        if (\core\Validaciones::errores_validacion_request($validaciones, $datos)) {
            $datos["view_content"] = \core\Vista::generar("form_anexar", $datos);
            $http_body = \core\Vista_Plantilla::generar("plantilla", $datos);
            \core\HTTP_Respuesta::enviar($http_body);
            
        } else {
            $datos['values']['fecha_lanzamiento'] = \core\Conversiones::fecha_hora_es_a_mysql($datos['values']['fecha_lanzamiento']);
            $datos['values']['precio'] = \core\Conversiones::decimal_coma_a_punto($datos['values']['precio']);        
            \modelos\Modelo_SQL::tabla('libros')->insert($datos['values']);
            \core\HTTP_Respuesta::set_header_line("location", \core\URL::generar("libros"));
            \core\HTTP_Respuesta::enviar();
        }
    }
    
    /**
     * url -> ?menu=libros&seccion=form_modificar | /libros/form_modificar
     * 
     * Esta función pasa el contenido/los datos para abrir la plantilla 
     * del formulario para modificar los datos de un nuevo libro de la BD
     * 
     * @param array $datos -> Es el array que contiene los datos necesarios para generar los contenidos de la web
     * @author Aída Morillas Muñoz (mormunai)
     */
    public function form_modificar(array $datos = array()) {

        $id = \core\HTTP_Requerimiento::post("id");
        $clausulas = array(
            'columnas' => '',
            'where' => 'id='.$id,
            'group_by' => '',
            'having' => '',
            'order_by' => ''
        );
        $datos["values"] = \modelos\Datos_SQL::tabla("libros")->select($clausulas);
        
        if (isset($datos['values'][0])) {
            $datos['values'] = $datos['values'][0];
        }

        $datos["view_content"] = \core\Vista::generar(__FUNCTION__, $datos);
        $http_body = \core\Vista_Plantilla::generar("plantilla", $datos);
        \core\HTTP_Respuesta::enviar($http_body);
        
    }

    /**
     * Este método será llamado cuando el usuario haya pulsado el boton 'submit' del formulario modificar
     * 
     * Se encargará de realizar la comprobación de los datos que ha introducido el usuario son válidos
     * y de que no le faltan datos por introducir.
     * 
     * Si el todos los datos son correctos, validará el formulario y modificará los datos en la BD.
     * Si se produce algún error en la validación se devolverá al usuario al formulario de modificar
     * y se le comunicarán los errores para que los corrija.
     * 
     * @param array $datos -> Es el array que contiene los datos necesarios para generar los contenidos de la web
     * @author Aída Morillas Muñoz (mormunai)
     */
    public function form_modificar_validar(array $datos = array()) {

        $validaciones = array(
            "titulo" => "errores_requerido",
            "autor" => "errores_requerido",
            "genero" => "errores_requerido",
            "fecha_lanzamiento" => "errores_fecha_hora && errores_requerido",
            "precio" => "errores_precio && errores_requerido"
        );

        if (\core\Validaciones::errores_validacion_request($validaciones, $datos)) {
            $datos["view_content"] = \core\Vista::generar("form_modificar", $datos);
            $http_body = \core\Vista_Plantilla::generar("plantilla", $datos);
            \core\HTTP_Respuesta::enviar($http_body);
            
        } else {
            $datos['values']['id'] = \core\HTTP_Requerimiento::post('id');
            $datos['values']['fecha_lanzamiento'] = \core\Conversiones::fecha_hora_es_a_mysql($datos['values']['fecha_lanzamiento']);
            $datos['values']['precio'] = \core\Conversiones::decimal_coma_a_punto($datos['values']['precio']);
            \modelos\Datos_SQL::tabla("libros")->update($datos['values'], 'libros', 'id='.$datos['values']['id']);
            $url = \core\URL::generar_sin_idioma("libros/index");
            \core\HTTP_Respuesta::set_header_line("location", $url);
            \core\HTTP_Respuesta::enviar();
            
        }
    }

    /**
     * url -> ?menu=libros&seccion=form_eliminar | /libros/form_eliminar
     * 
     * Esta función pasa el contenido/los datos para abrir la plantilla 
     * del formulario para confirmar la eliminación de un libro de la BD
     * 
     * @param array $datos -> Es el array que contiene los datos necesarios para generar los contenidos de la web
     * @author Aída Morillas Muñoz (mormunai)
     */
    public function form_eliminar(array $datos = array()) {

        $id = \core\HTTP_Requerimiento::post("id");
        $clausulas = array(
            'columnas' => '',
            'where' => 'id='.$id,
            'group_by' => '',
            'having' => '',
            'order_by' => ''
        );
        $datos["values"] = \modelos\Datos_SQL::tabla("libros")->select($clausulas);
        
        if (isset($datos['values'][0])) {
            $datos['values'] = $datos['values'][0];
        }

//              var_dump($datos['values']);
        $datos["view_content"] = \core\Vista::generar(__FUNCTION__, $datos);
        $http_body = \core\Vista_Plantilla::generar("plantilla", $datos);
        \core\HTTP_Respuesta::enviar($http_body);
    }

    /**
     * Este método será llamado cuando el usuario haya pulsado el boton 'submit' del formulario anexar
     * 
     * Se pasará directamente a eliminar los datos de la BD
     * 
     * @param array $datos -> Es el array que contiene los datos necesarios para generar los contenidos de la web
     * @author Aída Morillas Muñoz (mormunai)
     */
    public function form_eliminar_validar(array $datos = array()) {
        
        $datos['values']['id'] = \core\HTTP_Requerimiento::post('id');
        \modelos\Datos_SQL::tabla('libros')->delete(array('id'=>$datos['values']['id']));
        $url = \core\URL::generar_con_idioma("libros/index");
        \core\HTTP_Respuesta::set_header_line('location', $url);
        \core\HTTP_Respuesta::enviar();
        
    }
    
}

// Fin de la clase