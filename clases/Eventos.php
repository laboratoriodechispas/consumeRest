<?php
require("RestConsume.php");
class Eventos extends RestConsume{

    /*
    * contructor
    *
    * inicializo la ruta general inicializando la clase routes
    */
    public function __construct()
    {
        parent::__construct();



    }//function __construct()

    /*************************eventos*****************/
    /**
     * @return array|mixed
     * traer todos los eventos
     *
     * funcion encargada de traer una lista de todos los eventos disponibles
     */
    public function get_eventos()
    {
        $settings = $this->inicialize("get_service_eventos");

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
    }//function get_eventos()


    /*
     * informacion del evento
     *
     * Funcion que obtiene la informacion de un evento acorde
     * a su nombre
     */
    public function get_info_eventos($nombre_evento)
    {
        $settings = $this->inicialize("get_service_get_eventos");

        if ($settings) //verifico que exista post y que la inicializacion de curl sea correcta
        {

            //aqui los parametros que enviaremos al webservice
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "nombre_evento=".$nombre_evento);

            $get = $this->finalize();
            $obj = json_decode($get);

            return $obj;
            //return $curl_response;

        }//end if ($_POST && $settings)
        else
        {
            echo "error";
        }//end else
    }//end function get_info_eventos($nombre_evento)

    /**
     * @param $cantidad
     * @param $buscar
     * @param $orden
     * @return array|mixed
     *
     * busca un evento
     *
     * busca un evento acorde a la variable buscar
     * el orden por default es asc para cambiarlo usar desc y la cantidad
     * es el numero de registros que se quieren traer
     */
    public function find_evento($cantidad,$buscar,$orden){

        $settings = $this->inicialize("get_service_get_eventos");

        if ($settings) //verifico que exista post y que la inicializacion de curl sea correcta
        {

            //aqui los parametros que enviaremos al webservice
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "tamano=".$cantidad."&buscar=".$buscar."&asc=".$orden);

            $get = $this->finalize();
            $obj = json_decode($get);

            return $obj;
            //return $curl_response;

        }//end if ($_POST && $settings)
        else
        {
            echo "error";
        }//end else
    }//function find_evento($cantidad,$buscar,$orden)

    /********************************************************************************
     *                            Funciones ajax                                    *
     *******************************************************************************/

    /*
    * Inserta un evento
    *
    * Funcion que inserta un evento
    * devuelve un ok si la insecion se realiza correctamente
    */
    public function insert_evento()
    {
        $settings = $this->inicialize("get_service_add_eventos");

        if ($_REQUEST && $settings) //verifico que exista post y que la inicializacion de curl sea correcta
        {

            $nombre_evento  = $_POST['nombre_evento'];
            $descripcion    = $_POST['descripcion'];
            $fecha          = $_POST['fecha'];
            $ruta           = $_POST['ruta'];
            $img_destacada  = $_POST['img_destacada'];
            $img_thumbail   = $_POST['img_thumbail'];
            $convocatoria   = $_POST['convocatoria'];
            $tipo_evento    = $_POST['tipo_evento'];
            $id_organizador = $_POST['id_organizador'];


            //aqui los parametros que enviaremos al webservice
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "nombre_evento="
                .$nombre_evento."&descripcion="
                .$descripcion."&fecha="
                .$fecha."&ruta="
                .$ruta."&img_destacada="
                .$img_destacada."&img_thumbail="
                .$img_thumbail."&convocatoria="
                .$convocatoria."&tipo_evento="
                .$tipo_evento."&id_organizador=".$id_organizador);

            $get = $this->finalize();


            echo $get;

            //return $curl_response;

        }//end if ($_POST && $settings)
        else
        {
            echo "error";
        }//end else
    }//function insert_evento()

    /**
     * Hace un update
     *
     * Funcion encargada de realizar un update
     * devuelve un ok si la actualizacion se realizo correctamente
     */
    public function update_evento()
    {
        $settings = $this->inicialize("get_service_up_eventos");

        if ($_REQUEST && $settings) //verifico que exista post y que la inicializacion de curl sea correcta
        {

            $nombre_evento  = $_POST['nombre_evento'];
            $descripcion    = $_POST['descripcion'];
            $fecha          = $_POST['fecha'];
            $ruta           = $_POST['ruta'];
            $img_destacada  = $_POST['img_destacada'];
            $img_thumbail   = $_POST['img_thumbail'];
            $convocatoria   = $_POST['convocatoria'];
            $tipo_evento    = $_POST['tipo_evento'];
            $id_evento      = $_POST['id_evento'];


            //aqui los parametros que enviaremos al webservice
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "nombre_evento="
                .$nombre_evento."&descripcion="
                .$descripcion."&fecha="
                .$fecha."&ruta="
                .$ruta."&img_destacada="
                .$img_destacada."&img_thumbail="
                .$img_thumbail."&convocatoria="
                .$convocatoria."&tipo_evento="
                .$tipo_evento."&id_evento=".$id_evento);

            $get = $this->finalize();


            echo $get;

            //return $curl_response;

        }//end if ($_POST && $settings)
        else
        {
            echo "error";
        }//end else
    }//function update_evento()

    /**
     * Eliminar evento
     *
     * Funcion encargada de eliminar un evento
     * acorde a su id, devuelve un ok si se realiza correctamente
     */
    public function delete_evento()
    {
        $settings = $this->inicialize("get_service_del_eventos");

        if ($_REQUEST && $settings) //verifico que exista post y que la inicializacion de curl sea correcta
        {

            $id_evento  = $_POST['id_evento'];



            //aqui los parametros que enviaremos al webservice
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "id_evento=" .$id_evento);

            $get = $this->finalize();


            echo $get;

            //return $curl_response;

        }//end if ($_POST && $settings)
        else
        {
            echo "error";
        }//end else
    }//function delete_evento()

}
?>
