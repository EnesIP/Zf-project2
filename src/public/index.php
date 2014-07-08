<?php
define ( 'DS', DIRECTORY_SEPARATOR );
define ( 'APP_ENV', getenv ( 'APPLICATION_ENV' ) ?  : 'production' );
define ( 'ROOT_PATH', dirname ( dirname ( __DIR__ ) ) ); //Répertoire de l'application
define ( 'SRC_PATH', ROOT_PATH . DS . 'src' );
define ( 'PUBLIC_PATH', SRC_PATH . DS . 'public' );
define ( 'VENDOR_PATH', ROOT_PATH . DS . 'vendor' );
define ( 'APP_PATH', SRC_PATH . DS . 'application' );
define ( 'LIB_PATH', ROOT_PATH . DS . 'library' );
require_once VENDOR_PATH . DS . 'autoload.php';
require_once LIB_PATH . DS . '/ip/Error.php';
$autoloader = Zend_Loader_Autoloader::getInstance ();

if ("development" === APP_ENV) {
\php_error\reportErrors ();
} else {
	set_exception_handler (array("Error", "handleException")); //Un tableau avec le nom de la classe et le nom de la méthode en paramètre
	set_error_handler (array("Error", "handleError" ));
}

// try{
$application = new Zend_Application ( APP_ENV, APP_PATH . DS . 'Core' . DS . 'configs' . DS . 'application.ini' );
$application->bootstrap ();
$application->run ();
/*
 * }catch (Zend_Config_Exception $e){ // toujours utiliser le typage objet echo "Problème de config " . $e->getMessage(); if ('development' === APP_ENV){ echo "<pre>" . $e->getTraceAsString() . "</pre>"; } }catch (Zend_Application_Exception $e){ // toujours utiliser le typage objet echo "Problème de l'application " .$e->getMessage(); if ('development' === APP_ENV){ echo "<pre>" . $e->getTraceAsString() . "</pre>"; } }catch (Exception $e){ // toujours utiliser le typage objet echo "Problème général" . $e->getMessage(); if ('development' === APP_ENV){ echo "<pre>" . $e->getTraceAsString() . "</pre>"; } }
 */


