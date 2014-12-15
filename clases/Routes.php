<?php

/**
 * Class Routes
 *
 * encargada de administrar las rutas del webservice
 */


class Routes {

    protected $service;

    /**
     * constructor
     *
     * funcion encargada de inicializar la ruta general del webservice
     *
     */
    public function __construct(){
        $this->service = 'http://192.168.1.20/Bonfire/public/index.php/webservice';
    }


    /*******************users*******************/

    public function get_service_user_login(){
        return $this->get_users_service()."login";
    }

    public function get_service_info_user(){
        return $this->get_users_service()."get_info_user";
    }

    public function get_service_delete_user(){
        return $this->get_users_service()."delete_user";
    }

    public function get_service_find_user(){
        return $this->get_users_service()."find_user_by_email";
    }

    public function get_service_update_user(){
        return $this->get_users_service()."update_user";
    }

    /***************************eventos**********************/
    public function get_service_eventos(){
        return $this->get_evento_service()."get_all_evento";
    }

    public function get_service_add_eventos(){
        return $this->get_evento_service()."add_evento";
    }

    public function get_service__up_eventos(){
        return $this->get_evento_service()."update_evento";
    }

    public function get_service_get_eventos(){
        return $this->get_evento_service()."get_info_evento";
    }

    public function get_service_del_eventos(){
        return $this->get_evento_service()."delete_evento";
    }

    public function get_service_find_eventos(){
        return $this->get_evento_service()."find_evento";
    }



    /***********************tipo eventos**********************/
    public function get_service_tipo_evento(){
        return $this->get_evento_service()."get_tipo_evento";
    }

    public function get_service_id_tipo_evento(){
        return $this->get_evento_service()."get_id_tipo_evento";
    }

    public function get_service_add_tipo_evento(){
        return $this->get_evento_service()."add_tipo_evento";
    }

    public function get_service_up_tipo_evento(){
        return $this->get_evento_service()."update_tipo_evento";
    }


    public function get_service_del_tipo_evento(){
        return $this->get_evento_service()."delete_tipo_evento";
    }



    /****************************************************************************
     *                      funciones reservadas                                *
     ***************************************************************************/

    /**
     * @return string
     * ruta usuarios
     *
     * Funcion que devuelve la ruta general de usuarios del webservice
     */
    private function get_users_service(){
        return $this->service."/users/";
    }

    /**
     * @return string
     * ruta evento
     *
     * Funcion que devuelve la ruta general de eventos
     * del webservice
     */
    private function get_evento_service(){
        return $this->service."/gestion_eventos/";
    }


} 