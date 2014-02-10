<?php

namespace controladores;

class libros extends \core\Controlador {

    /**
     * ?menu=libros | /libros/index
     * Esta función pasa el contenido/los datos para generar la plantilla básica (index)
     * de la sección de libros
     * 
     * @param array $datos
     * @author Aída Morillas Muñoz (mormunai)
     * 
     */
    public function index(array $datos = array()) {
        /* Código jequeto
         * ---------------------------------------------------------------------------------
         * $clausulas['order_by'] = 'nombre';
          $datos["filas"] = \modelos\Datos_SQL::table("articulos")->select( $clausulas ); // Recupera todas las filas ordenadas
          $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
          $http_body = \core\Vista_Plantilla::generar('plantilla_principal', $datos);
          \core\HTTP_Respuesta::enviar($http_body);
         * -----------------------------------------------------------------------------------
         */
//        $datos['values'] = \modelos\Libros_En_Fichero::get_libros();
//        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos, true);
//        $http_body = \core\Vista_Plantilla::generar('plantilla', $datos, true);
//        \core\HTTP_Respuesta::enviar($http_body);
        $clausulas = array(
            'columnas' => '',
            'where' => '',
            'group_by' => '',
            'having' => '',
            'order_by' => 'titulo'
        );
        $datos['values'] = \modelos\Datos_SQL::tabla("libros")->select($clausulas);
        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
        $http_body = \core\Vista_Plantilla::generar('plantilla', $datos);
        \core\HTTP_Respuesta::enviar($http_body);
    }

    /**
     * ?menu=libros&seccion=form_anexar
     * Esta función pasa el contenido/los datos para abrir la plantilla 
     * del formulario para anexar un nuevo libro
     * @param array $datos
     * @author Aída Morillas Muñoz (mormunai)
     */
    public function form_anexar(array $datos = array()) {

        /**
         * $clausulas['order_by'] = " nombre ";
          $datos['categorias'] = \modelos\Datos_SQL::table("categorias")->select($clausulas);

          $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
          $http_body = \core\Vista_Plantilla::generar('plantilla_principal', $datos);
          \core\HTTP_Respuesta::enviar($http_body);
         */
        $datos["values"] = array(
            "titulo" => "",
            "autor" => "",
            "fecha_lanzamiento" => "",
            "genero" => "",
            "precio" => "");
        $datos["view_content"] = \core\Vista::generar(__FUNCTION__, $datos);
        $http_body = \core\Vista_Plantilla::generar("plantilla", $datos);
        \core\HTTP_Respuesta::enviar($http_body);
    }

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

    public function form_eliminar_validar(array $datos = array()) {
        
        $datos['values']['id'] = \core\HTTP_Requerimiento::post('id');
        \modelos\Datos_SQL::tabla('libros')->delete(array('id'=>$datos['values']['id']));
        $url = \core\URL::generar_con_idioma("libros/index");
        \core\HTTP_Respuesta::set_header_line('location', $url);
        \core\HTTP_Respuesta::enviar();
        
    }
    
}

// Fin de la clase