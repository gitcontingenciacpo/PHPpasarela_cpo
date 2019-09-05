<?php
class Databasemysql
{
    //Esta función permite la conexión al SGBD: MariaDB.
    //host = tipo de conexión local - 'localhost'.
    //dbname = nombre de la base de datos.
    //charset = utf8, indica la codificación de caracteres utilizada.
    //root = nombre de usuario (solo para fines académicos=root).
    //'' = contraseña del root (solo para fines académicos).

    public static function Conectar()
    {
        //$pdo = new PDO('mysql:host=10.10.74.47;dbname=contingencia_unidad;charset=utf8', 'admContinUnid', 'Colombia2012');
	$pdo = new PDO('mysql:host=10.10.74.47;dbname=contingencia_unidad_uab;charset=utf8', 'admContinUnid', 'admContinUnid2018.');
        //Filtrando posibles errores de conexión.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
