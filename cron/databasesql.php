<?php
class Databasesql
{
    //Esta función permite la conexión al SGBD: MariaDB.
    //host = tipo de conexión local - 'localhost'.
    //dbname = nombre de la base de datos.
    //charset = utf8, indica la codificación de caracteres utilizada.
    //root = nombre de usuario (solo para fines académicos=root).
    //'' = contraseña del root (solo para fines académicos).

    public static function Conectar()
    {
        //$pdo = new PDO('mysql:host=localhost;dbname=mvc_php;charset=utf8', 'root', '');
		$pdo = new PDO('sqlsrv:server=10.10.8.154;Database=contingencia_unidad','ADMIN','TRIACON');
        //Filtrando posibles errores de conexión.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
