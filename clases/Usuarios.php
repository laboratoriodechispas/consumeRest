<?php
require("RestConsume.php");
class Usuarios extends RestConsume{

    /*
    * contructor
    *
    * inicializo la ruta general inicializando la clase routes
    */
    public function __construct()
    {
        parent::__construct();



    }//function __construct()

    /*********************users*******************/
    /**
     * @param $email
     * @return array|mixed
     *
     * buscar un usuario por su mail
     *
     * Funcion encargada de buscar un usuario a travez de su mail
     *
     */
    public function find_user($email)
    {
        $settings = $this->inicialize("find_user_by_email");

        if ($settings) //verifico que exista post y que la inicializacion de curl sea correcta
        {

            //aqui los parametros que enviaremos al webservice
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "email=" . $email );

            $get = $this->finalize();
            $obj = json_decode($get);

            return $obj;
            //return $curl_response;

        }//end if ($_POST && $settings)
        else
        {
            echo "error";
        }//end else
    }//function find_user($email)

    /*
     * traer info del usuarios
     *
     * trae toda la info de un usuario a travez de su id
     */
    public function get_info_user($id)
    {
        $settings = $this->inicialize("get_service_info_user");

        if ($settings) //verifico que exista post y que la inicializacion de curl sea correcta
        {

            //aqui los parametros que enviaremos al webservice
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "id=" . $id );

            $get = $this->finalize();
            $obj = json_decode($get);

            return $obj;
            //return $curl_response;

        }//end if ($_POST && $settings)
        else
        {
            echo "error";
        }//end else
    }//function get_info_user($id)



    /*******************************************************************
     *                                                                 *
     *                funciones Ajax                                   *
     *                                                                 *
     *******************************************************************/

    /*
     * login
     *
     * funcion encargada del login del usuario
     * llamo la ruta de login y mando los datos via post
     */
    public function login()
    {

        $settings = $this->inicialize("get_service_user_login");

        if ($_REQUEST && $settings) //verifico que exista post y que la inicializacion de curl sea correcta
        {

            //aqui iria la validacion y asignacion de variables
            $email = $_REQUEST["email"];
            $password = $_REQUEST["password"];

            //aqui los parametros que enviaremos al webservice
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "email=" . $email . "&password=" . $password);

            $get = $this->finalize();
            $obj = json_decode($get);

            echo $get;

            if($obj->response=="ok")
            {
                session_start();
                $_SESSION['id_user'] = $obj->data->user->id;
            }

            //return $curl_response;

        }//end if ($_POST && $settings)
        else
        {
            echo "error";
        }//end else
    }//function login()

    /*
    * kill session
    *
    * mata la session que se ha creado
    */
    public function kill_session()
    {
        session_destroy();
    }//function kill_session()

    /**
     * @return array|mixed
     * insertar usuario
     *
     * Funcion encargada de insertar un usuario
     * devuelve ok si la insersion fue exitosa
     *
     */
    public function insert_user()
    {
        $settings = $this->inicialize("get_service_user_login");

        if ($_REQUEST && $settings) //verifico que exista post y que la inicializacion de curl sea correcta
        {

            $nombre               = $_REQUEST['nombre'];
            $apellido_paterno     = $_REQUEST['apellido_paterno'];
            $pais_nacimiento      = $_REQUEST['pais_nacimiento'];
            $apellido_materno     = $_REQUEST['apellido_materno'];
            $fecha_nacimiento     = $_REQUEST['fecha_nacimiento'];
            $residencia           = $_REQUEST['residencia'];
            $direccion            = $_REQUEST['direccion'];
            $colonia              = $_REQUEST['colonia'];
            $delegacion_municipio = $_REQUEST['delegacion_municipio'];
            $cp                   = $_REQUEST['cp'];
            $edad                 = $_REQUEST['edad'];
            $sexo                 = $_REQUEST['sexo'];
            $telefono_contacto    = $_REQUEST['telefono_contacto'];
            $email                = $_REQUEST['email'];
            $username             = $_REQUEST['username'];
            $password             = $_REQUEST['password'];

            //aqui los parametros que enviaremos al webservice
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "nombre=".$nombre.
                "&apellido_paterno=".$apellido_paterno.
                "&pais_nacimiento=" .$pais_nacimiento.
                "&apellido_materno=".$apellido_materno.
                "&fecha_nacimiento=" .$fecha_nacimiento.
                "&residencia=".$residencia.
                "&direccion=" .$direccion.
                "&colonia=".$colonia.
                "&delegacion_municipio=" .$delegacion_municipio.
                "&cp=".$cp.
                "&edad=" .$edad.
                "&sexo=".$sexo.
                "&telefono_contacto=" .$telefono_contacto.
                "&email=".$email.
                "&username=" .$username.
                "&password=".$password);

            $get = $this->finalize();

            echo $get;

        }//end if ($_POST && $settings)
        else
        {
            echo "error";
        }//end else
    }//function insert_user()

    /**
     * Update a un usuario
     *
     * Funcion encargada de hacer un update al usuario de toda la informacion
     * es necesario el id, si el update fue exitoso devuelve un ok
     */
    public function update_user()
    {
        $settings = $this->inicialize("get_service_update_user");

        if ($_REQUEST && $settings) //verifico que exista post y que la inicializacion de curl sea correcta
        {

            $nombre               = $_REQUEST['nombre'];
            $apellido_paterno     = $_REQUEST['apellido_paterno'];
            $pais_nacimiento      = $_REQUEST['pais_nacimiento'];
            $apellido_materno     = $_REQUEST['apellido_materno'];
            $fecha_nacimiento     = $_REQUEST['fecha_nacimiento'];
            $residencia           = $_REQUEST['residencia'];
            $direccion            = $_REQUEST['direccion'];
            $colonia              = $_REQUEST['colonia'];
            $delegacion_municipio = $_REQUEST['delegacion_municipio'];
            $cp                   = $_REQUEST['cp'];
            $edad                 = $_REQUEST['edad'];
            $sexo                 = $_REQUEST['sexo'];
            $telefono_contacto    = $_REQUEST['telefono_contacto'];
            $password             = $_REQUEST['password'];
            $id                   = $_REQUEST['id'];

            //aqui los parametros que enviaremos al webservice
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "nombre=".$nombre.
                "&apellido_paterno=".$apellido_paterno.
                "&pais_nacimiento=".$pais_nacimiento.
                "&apellido_materno=".$apellido_materno.
                "&fecha_nacimiento=" .$fecha_nacimiento.
                "&residencia=".$residencia.
                "&direccion=".$direccion.
                "&colonia=".$colonia.
                "&delegacion_municipio=" .$delegacion_municipio.
                "&cp=".$cp.
                "&edad=" .$edad.
                "&sexo=".$sexo.
                "&telefono_contacto=" .$telefono_contacto.
                "&id=".$id.
                "&password=".$password);

            $get = $this->finalize();

            echo $get;

        }//end if ($_POST && $settings)
        else
        {
            echo "error";
        }//end else
    }//function update_user()

    /**
     * eliminar usuario
     *
     * elimina un usuario a travez de su id
     * devuelve un json con ok o con error
     */
    public function delete_user()
    {

        $settings = $this->inicialize("get_service_delete_user");

        if ($_REQUEST && $settings) //verifico que exista post y que la inicializacion de curl sea correcta
        {

            //aqui iria la validacion y asignacion de variables
            $id = $_REQUEST["id"];


            //aqui los parametros que enviaremos al webservice
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "id=" . $id );

            $get = $this->finalize();

            echo $get;

            //return $curl_response;

        }//end if ($_POST && $settings)
        else
        {
            echo "error";
        }//end else
    }//function delete_user()



}