<?php
require("Routes.php");
/*
 * clase para consumir el webservice tiene como principal utilidad el devolver
 * el arreglo que se requiera desde el webservice
 */
abstract class RestConsume extends Routes
{


    protected  $curl;
    protected  $options;

    /*
     * contructor
     *
     * inicializo la ruta general inicializando la clase routes
     */
    public function __construct()
    {
        parent::__construct();



    }//function __construct()





    /***********************************************************************
     *                                                                      *
     *                  funciones reservadas                                *
     *                                                                      *
     ***********************************************************************/

    /*
     * inicializa curl
     *
     * funcion encargada de inicializar curl con la configuracion de
     * url que le mandemos el parametro funcion debe ser valido en la clase Routes
     * de lo contrario las funciones que llamen a esta daran un error
     */
    protected function inicialize($function)
    {

            $this->curl = curl_init($this->$function());
            curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($this->curl, CURLOPT_TIMEOUT, 1);
            curl_setopt($this->curl, CURLOPT_HTTPPROXYTUNNEL, 0);
            curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($this->curl, CURLOPT_USERPWD, "admin:1234");
            curl_setopt($this->curl, CURLOPT_POST, true);
            return true;

    }//end function inicialize($function)

    /*
     * finalizar curl
     *
     * Funcion encargada de finalizar curl en cada funcion
     * dada la necesidad de reutilizacion de este codigo
     * y para facilidad de uso y sintaxis general
     */
    protected function finalize()
    {
        $curl_response = curl_exec($this->curl);

        curl_close($this->curl);

        return $curl_response;
    }//end function finalize()
}

?>