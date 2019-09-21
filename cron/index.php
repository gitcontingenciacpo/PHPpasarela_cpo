<?php
  //Se incluye la configuración de conexión a datos en el
  //SGBD: MariaDB.
  require_once 'databasesql.php';
  require_once 'databasemysql.php';

  $url = '../api/ParamCont.php';
  $fileInclude = (file_exists($url)) ? $url : str_replace("/", "\\", $url);

  if (!file_exists($fileInclude)) {
    $fileInclude = '/var/www/html/PHPpasarela/api/ParamCont.php';
  }
  
  require_once $fileInclude;
  $DbParam = new ParamCont();
  /**
   * Carga constantes para conexión MySql
   */
  define('HOSTNAME_MYSQL', $DbParam->getHostnameMySql());
  define('DBNAME_MYSQL', $DbParam->getDatabaseMySql());
  define('DBUSER_MYSQL', $DbParam->getUsernameMySql());
  define('PASSWORD_MYSQL', $DbParam->getPasswordMySql());
  /**
   * Carga constantes para conexión SQLServer
   */
  define('HOSTNAME_SQLSRV', $DbParam->getHostnameSQLServ());
  define('DBNAME_SQLSRV', $DbParam->getDatabaseSQLServ());
  define('DBUSER_SQLSRV', $DbParam->getUsernameSQLServ());
  define('PASSWORD_SQLSRV', $DbParam->getPasswordSQLServ());
  /**
   * Carga constante Codigo Unidad -> CODIGOIPS
   */
  define('CODIGOIPS', $DbParam->getUnidadID());

  //Para registrar productos es necesario iniciar los proveedores
  //de los mismos, por ello la variable controller para este
  //ejercicio se inicia con el 'proveedor'.
  $controller = 'proveedor';

  // Todo esta lógica hara el papel de un FrontController
  if(!isset($_REQUEST['c']))
  {
    //Llamado de la página principal
    require_once "$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();
  }
  else
  {
    // Obtiene el controlador a cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

    // Instancia el controlador
    require_once "$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
  }
