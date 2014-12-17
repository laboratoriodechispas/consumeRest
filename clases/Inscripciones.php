<?php
/**
 * Created by PhpStorm.
 * User: Spark
 * Date: 16/12/2014
 * Time: 01:24 PM
 */
require("RestConsume.php");
class Inscripciones extends RestConsume{

    /*
   * contructor
   *
   * inicializo la ruta general inicializando la clase routes
   */
    public function __construct()
    {
        parent::__construct();



    }//function __construct()

    /*********************Inscripciones*******************/


    /*
     * traer las inscripciones de un determinado evento
     *
     * trae toda la info de un usuario a travez de su id
     */
    public function get_inscripciones($id)
    {
        $settings = $this->inicialize("get_service_get_inscripciones");

        if ($settings) //verifico que exista post y que la inicializacion de curl sea correcta
        {

            //aqui los parametros que enviaremos al webservice
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "id_evento=" . $id );

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



    /*******************************************************************
     *                                                                 *
     *                funciones Ajax                                   *
     *                                                                 *
     *******************************************************************/

    /*
     * add inscripcion
     *
     * funcion encargada de añadir una inscripcion
     * asocia un usuario con un evento, indicando el pago
     * al mismo
     *
     */
    public function add_inscripcion()
    {

        $settings = $this->inicialize("get_service_add_inscripcion");

        if ($_REQUEST && $settings) //verifico que exista post y que la inicializacion de curl sea correcta
        {

            //aqui iria la validacion y asignacion de variables

            $id_ususario           = $_REQUEST['id_ususario'];
            $id_evento             = $_REQUEST['id_evento'];
            $fecha_inscripcion     = $_REQUEST['fecha_inscripcion'];
            $fuencte_subscripcion  = $_REQUEST['fuencte_subscripcion'];
            $tipo_pago             = $_REQUEST['tipo_pago'];



            //aqui los parametros que enviaremos al webservice
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, 'id_ususario='.$id_ususario.
                                                         'id_evento='.$id_evento.
                                                         'fecha_inscripcion='.$fecha_inscripcion.
                                                         'fuencte_subscripcion='.$fuencte_subscripcion.
                                                         'tipo_pago='.$tipo_pago);

            $get = $this->finalize();

            echo $get;


            //return $curl_response;

        }//end if ($_POST && $settings)
        else
        {
            echo "error";
        }//end else
    }//function login()
    /***********************************************************************tipo_de_pago**************************************************************/

    /*
      * traer los tipos de pago
      *
      * trae todos los tipos de pago disponibles
      */
    public function get_tipo_pago($id)
    {
        $settings = $this->inicialize("get_service_get_tipo_pago");

        if ($settings) //verifico que exista post y que la inicializacion de curl sea correcta
        {

            //aqui los parametros que enviaremos al webservice
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "id_evento=".$id);

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



} 