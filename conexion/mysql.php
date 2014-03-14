<?
class mysql {

    var $res;
    var $con;
    var $host;
    var $user;
    var $pas;
    var $bd;
    var $registro;
    var $error;

    function mysql($h, $u, $p, $b) {
        $this->host = $h;
        $this->user = $u;
        $this->pas = $p;
        $this->bd = $b;
        $this->con = @mysql_connect($this->host, $this->user, $this->pas);
        if (!$this->con) {
            die("No se puede conectar al servidor."); //. mysql_error()
        }
        if (!@mysql_select_db($this->bd)) {
            die("No se puede abrir la base de datos.");
        }
    }

    function query($q) {
        $this->res = mysql_query($q, $this->con);
        return $this->res;
    }

    function result() {
        $this->registro = mysql_fetch_array($this->res);
        return $this->registro;
    }

    function close() {
        mysql_close($this->con);
    }

}
?>
