<?php
/**
 * Created by PhpStorm.
 * User: Spark
 * Date: 15/12/2014
 * Time: 11:01 AM
 */
require('RestConsume.php');
class Tipo_evento extends RestConsume{

    /*
    * contructor
    *
    * inicializo la ruta general inicializando la clase routes
    */
    public function __construct()
    {
        parent::__construct();

    }//function __construct()

    /*************************tipo evento*****************/
    /**
     * @return array|mixed
     * traer todos los eventos
     *
     * funcion encargada de traer una lista de todos los eventos disponibles
     */
    public function get_tipo_evento()
    {
        $settings = $this->inicialize("get_service_tipo_evento");

        if ($settings) //verifico que exista post y que la inicializacion de curl sea correcta
        {

            //aqui los parametros que enviaremos al webservice
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "var= ");

            $get = $this->finalize();
            $obj = json_decode($get);

            return $obj;
            //return $curl_response;

        }//end if ($_POST && $settings)
        else
        {
            echo "error";
        }//end else
    }//function get_tipo_evento()


    /*
     * informacion del evento
     *
     * Funcion que obtiene la informacion de un evento acorde
     * a su nombre
     */
    public function get_id_tipo_evento($tipo_evento)
    {
        $settings = $this->inicialize("get_service_id_tipo_evento");

        if ($settings) //verifico que exista post y que la inicializacion de curl sea correcta
        {

            //aqui los parametros que enviaremos al webservice
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "tipo_evento=".$tipo_evento);

            $get = $this->finalize();
            $obj = json_decode($get);

            return $obj;
            //return $curl_response;

        }//end if ($_POST && $settings)
        else
        {
            echo "error";
        }//end else
    }//end get_id_tipo_evento($tipo_evento)



    /********************************************************************************
     *                            Funciones ajax                                    *
     *******************************************************************************/

    /*
    * Inserta un evento
    *
    * Funcion que inserta un tipo evento
    * devuelve un ok si la insecion se realiza correctamente
    */
    public function insert_tipo_evento()
    {
        $settings = $this->inicialize("get_service_add_tipo_evento");

        if ($_REQUEST && $settings) //verifico que exista post y que la inicializacion de curl sea correcta
        {

            $tipo_evento  = $_POST['tipo_evento'];



            //aqui los parametros que enviaremos al webservice
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "tipo_evento=" .$tipo_evento);

            $get = $this->finalize();


            echo $get;

            //return $curl_response;

        }//end if ($_POST && $settings)
        else
        {
            echo "error";
        }//end else
    }//function insert_tipo_evento()

    /**
     * Hace un update
     *
     * Funcion encargada de realizar un update
     * devuelve un ok si la actualizacion se realizo correctamente
     */
    public function update_tipo_evento()
    {
        $settings = $this->inicialize("get_service_up_tipo_evento");

        if ($_REQUEST && $settings) //verifico que exista post y que la inicializacion de curl sea correcta
        {

            $tipo_evento    = $_POST['tipo_evento'];
            $id_tipo_evento = $_POST['id_tipo_evento'];


            //aqui los parametros que enviaremos al webservice
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "tipo_evento="
                .$tipo_evento."&id_tipo_evento="
                .$id_tipo_evento);

            $get = $this->finalize();


            echo $get;

            //return $curl_response;

        }//end if ($_POST && $settings)
        else
        {
            echo "error";
        }//end else
    }//function update_tipo_evento()

    /**
     * Eliminar evento
     *
     * Funcion encargada de eliminar un tipo evento
     * acorde a su id, devuelve un ok si se realiza correctamente
     */
    public function delete_tipo_evento()
    {
        $settings = $this->inicialize("get_service_del_tipo_evento");

        if ($_REQUEST && $settings) //verifico que exista post y que la inicializacion de curl sea correcta
        {

            $id_tipo_evento  = $_POST['id_tipo_evento'];



            //aqui los parametros que enviaremos al webservice
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "id_tipo_evento=" .$id_tipo_evento);

            $get = $this->finalize();


            echo $get;

            //return $curl_response;

        }//end if ($_POST && $settings)
        else
        {
            echo "error";
        }//end else
    }//end function delete_tipo_evento()
} 