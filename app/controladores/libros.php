<?php

namespace controladores;

class libros extends \core\Controlador {

    /**
     * ?menu=libros | /libros/index
     * Esta función pasa el contenido/los datos para generar la plantilla básica (index)
     * de la sección de libros
     * @param array $datos
     * @author Aída Morillas Muñoz (mormunai)
     */
    public function index(array $datos = array()) {
/* Código jequeto
 * ---------------------------------------------------------------------------------
 *              $clausulas['order_by'] = 'nombre';
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

        $datos["values"] = array("titulo" => "", "autor" => "", "comentario" => "");
        $datos["view_content"] = \core\Vista::generar(__FUNCTION__, $datos);
        $http_body = \core\Vista_Plantilla::generar("plantilla", $datos);
        \core\HTTP_Respuesta::enviar($http_body);
        
    }
    
    public function form_anexar_validar(array $datos = array()) {
        
        $validacion = array(
            "titulo" => "errores_requerido && errores_texto && errores_prohibido_punto_y_coma",
            "autor" => "errores_requerido && errores_texto && errores_prohibido_punto_y_coma",
            "comentario" => "errores_texto && errores_prohibido_punto_y_coma"
        );
        if (!\core\Validaciones::errores_validacion_request($validacion, $datos)) {
            \modelos\Libros_En_Fichero::anexar_libro($datos["values"]);
            $url = \core\URL::generar_sin_idioma("libros/index");
            \core\HTTP_Respuesta::set_header_line("location", $url);
            \core\HTTP_Respuesta::enviar();
        } else {
            $datos["view_content"] = \core\Vista::generar("form_anexar", $datos);
            $http_body = \core\Vista_Plantilla::generar("plantilla", $datos);
            \core\HTTP_Respuesta::enviar($http_body);
        }
        
    }
    
    public function form_modificar(array $datos = array()) {
        
        $datos["values"] = \modelos\Libros_En_Fichero::get_libro(\core\HTTP_Requerimiento::request("id"));
        $datos["view_content"] = \core\Vista::generar(__FUNCTION__, $datos);
        $http_body = \core\Vista_Plantilla::generar("plantilla", $datos);
        \core\HTTP_Respuesta::enviar($http_body);
        
    }
    
    public function form_modificar_validar(array $datos = array()) {
        
        $validacion = array(
            "id"         => "errores_requerido",
            "titulo"     => "errores_requerido && errores_texto && errores_prohibido_punto_y_coma",
            "autor"      => "errores_requerido && errores_texto && errores_prohibido_punto_y_coma",
            "comentario" => "errores_texto && errores_prohibido_punto_y_coma"
        );
        
        if (!\core\Validaciones::errores_validacion_request($validacion, $datos)) {
            \modelos\Libros_En_Fichero::modificar_libro($datos["values"]);
            $url = \core\URL::generar_sin_idioma("libros/index");
            \core\HTTP_Respuesta::set_header_line("location", $url);
            \core\HTTP_Respuesta::enviar();
        } else {
            $datos["view_content"] = \core\Vista::generar("form_modificar", $datos);
            $http_body = \core\Vista_Plantilla::generar("plantilla", $datos);
            \core\HTTP_Respuesta::enviar($http_body);
        }
        
    }
    
    public function form_eliminar(array $datos = array()) {
        
        $datos["values"] = \modelos\Libros_En_Fichero::get_libro(\core\HTTP_Requerimiento::request("id"));
        
        $datos["view_content"] = \core\Vista::generar(__FUNCTION__, $datos);
        $http_body = \core\Vista_Plantilla::generar("plantilla", $datos);
        \core\HTTP_Respuesta::enviar($http_body);
        
    }
    
    public function form_eliminar_validar(array $datos = array()) {
        \modelos\Libros_En_Fichero::borrar_libro(\core\HTTP_Requerimiento::request("id"));
        $url = \core\URL::generar_con_idioma("libros/index");
        \core\HTTP_Respuesta::set_header_line('location', $url);
        \core\HTTP_Respuesta::enviar();
    }
    
}

// Fin de la clase