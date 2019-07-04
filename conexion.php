<?php
$con = new mysqli("www.ceuarkos.edu.mx:3306","ceuarkos","C3u4rk@s2018","ceuarkos_saceua_caja");
$conn = new mysqli("www.ceuarkos.edu.mx:3306","ceuarkos","C3u4rk@s2018","ceuarkos_saceua_caja");
	//$conn = new mysqli("www.ceuarkos.edu.mx:3306","ceuarkos","C3u4rk@s2018","ceuarkos_saceua_caja");
	$tildes = $conn -> query("SET NAMES 'utf8'");

	class Conexion
    {
        private $conn;
        function __construct()
        {
            $this->conn=new mysqli("www.ceuarkos.edu.mx:3306","ceuarkos","C3u4rk@s2018","ceuarkos_saceua_caja");
        }
        function _ObtenerConexion()
        {
            return  $this->conn;
        }
    }
?>