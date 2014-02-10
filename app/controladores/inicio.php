<?php

namespace controladores;

class inicio extends \core\Controlador {

    /**
     * url -> ?menu=inicio | inicio/index
     * 
     * Este método se encarga de generar la vista del index de la página web.
     * 
     * @param array $datos -> Es el array que contiene los datos necesarios para generar los contenidos de la web
     * 
     */
    public function index(array $datos = array()) {

        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos, true);
        $http_body = \core\Vista_Plantilla::generar('plantilla', $datos, true);
        \core\HTTP_Respuesta::enviar($http_body);
    }

}

// Fin de la clase