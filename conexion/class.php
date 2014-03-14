<?php
    class DB_mysql{
        /* variables de conexi�n */
        var $BaseDatos;
        var $Servidor;
        var $Usuario;
        var $Clave;
        /* identificador de conexi�n y consulta */
        var $Conexion_ID = 0;
        var $Consulta_ID = 0;
        var $retorno_ID=0;
        /* n�mero de error y texto error */
        var $Errno = 0;
        var $Error = "";


        /* Metodo Constructor: Cada vez que creemos una variable
        de esta clase, se ejecutar� esta funci�n */
        function DB_mysql($bd = "", $host = "", $user = "", $pass = "") 
        {
           $this->BaseDatos = $bd;
           $this->Servidor = $host;
           $this->Usuario = $user;
           $this->Clave = $pass;
        }

         /*Conexion a la base de datos*/
        function conectar($bd, $host, $user, $pass)
        {
            if ($bd != "") $this->BaseDatos = $bd;
            if ($host != "") $this->Servidor = $host;
            if ($user != "") $this->Usuario = $user;
            if ($pass != "") $this->Clave = $pass;

            // Conectamos al servidor
            $this->Conexion_ID = mysql_connect($this->Servidor, $this->Usuario, $this->Clave);

            //si no logramos conectar
            if (!@$this->Conexion_ID)
            {
                $this->Error = "Ha fallado la conexi�n.";
                $this->diceerror();
                return 0;
            }

            //seleccionamos la base de datos
            if (!@mysql_select_db($this->BaseDatos, $this->Conexion_ID)) 
            {
                $this->Error = "Imposible abrir ".$this->BaseDatos ;
                $this->diceerror();
                return 0;
            }

            /* Si hemos tenido exito conectando devuelve 
            el identificador de la conexion, sino devuelve 0 */
            return $this->Conexion_ID;
        }


        /* Ejecutar consulta */
        function consulta($sql)
        {
            if ($sql == "") 
            {
                $this->Error = "No ha especificado una consulta SQL";
                $this->diceerror();
                return 0;
            }

            //ejecutamos la consulta
            $this->Consulta_ID = @mysql_query($sql, $this->Conexion_ID);
            if (!$this->Consulta_ID) 
            {
                $this->Errno = mysql_errno();
                $this->Error = "Comando de consulta no reconocido";
                $this->diceerror();
            }

            /* Si hemos tenido exito en la consulta devuelve 
            el identificador de la conexi�n, sino devuelve 0 */
            $this->retorno_ID = mysql_insert_id();
            return $this->Consulta_ID;
        }


        /* Devuelve el numero de campos de una consulta */
        function numcampos(){  
            return mysql_num_fields($this->Consulta_ID);  
        }

        /* Devuelve el numero de registros de una consulta */
        function numregistros(){
            return mysql_num_rows($this->Consulta_ID);	
        }

        /* Devuelve el nombre de un campo de una consulta */
        function nombrecampo($numcampo){
            return mysql_field_name($this->Consulta_ID, $numcampo);
        }

        function diceerror(){
            echo "<font color=#FF0000>".$this->Error."<br/>".mysql_error()."<br/>".mysql_errno()."</font>";
        }

        function Close(){
            mysql_close($this->Conexion_ID);
        }

    } //fin de la Clse DB_mysql
?>