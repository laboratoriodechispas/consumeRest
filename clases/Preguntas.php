<?php
/**
 * Created by PhpStorm.
 * User: Spark
 * Date: 16/12/2014
 * Time: 03:09 PM
 */
require('RestConsume.php');
class Preguntas extends RestConsume{

    /*
    * contructor
    *
    * inicializo la ruta general inicializando la clase routes
    */
    public function __construct()
    {
        parent::__construct();



    }//function __construct()

    /*
        * traer las inscripciones de un determinado evento
        *
        * trae toda la info de un usuario a travez de su id
        */
    public function get_preguntas($id)
    {
        $settings = $this->inicialize("get_service_get_pregunta");

        if ($settings) //verifico que exista post y que la inicializacion de curl sea correcta
        {

            //aqui los parametros que enviaremos al webservice
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "id_evento=".$id );

            $get = $this->finalize();

            $obj = json_decode($get);

            return $obj;
            //return $curl_response;

        }//end if ($_POST && $settings)
        else
        {
            echo "error";
        }//end else
    }//function get_inscripciones($id)

    private function getRespuesta($id)
    {
return $id;
    }

} 