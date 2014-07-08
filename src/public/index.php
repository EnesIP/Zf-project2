<?php
define ( 'DS', DIRECTORY_SEPARATOR );
define ( 'APP_ENV', getenv ( 'APPLICATION_ENV' ) ?  : 'production' );
define ( 'ROOT_PATH', dirname ( dirname ( __DIR__ ) ) );
define ( 'SRC_PATH', ROOT_PATH . DS . 'src' );
define ( 'PUBLIC_PATH', SRC_PATH . DS . 'public' );
define ( 'VENDOR_PATH', ROOT_PATH . DS . 'vendor' );
define ( 'APP_PATH', SRC_PATH . DS . 'application' );
require_once VENDOR_PATH . DS . 'autoload.php';

$autoloader = Zend_Loader_Autoloader::getInstance ();

if ("development" === APP_ENV) {
\php_error\reportErrors ();
} else {
	set_exception_handler ( "exceptionHandler" );
	set_error_handler ( "errorHandler" );
}

// try{
$application = new Zend_Application ( APP_ENV, APP_PATH . DS . 'Core' . DS . 'configs' . DS . 'application.ini' );
$application->bootstrap ();
$application->run ();
/*
 * }catch (Zend_Config_Exception $e){ // toujours utiliser le typage objet echo "Problème de config " . $e->getMessage(); if ('development' === APP_ENV){ echo "<pre>" . $e->getTraceAsString() . "</pre>"; } }catch (Zend_Application_Exception $e){ // toujours utiliser le typage objet echo "Problème de l'application " .$e->getMessage(); if ('development' === APP_ENV){ echo "<pre>" . $e->getTraceAsString() . "</pre>"; } }catch (Exception $e){ // toujours utiliser le typage objet echo "Problème général" . $e->getMessage(); if ('development' === APP_ENV){ echo "<pre>" . $e->getTraceAsString() . "</pre>"; } }
 */
function exceptionHandler($e) // Permet de catcher les erreurs en général
{
	echo "Erreur de l'application";
	// Mettre dans les logs
	// Envoyer un mail
}
function errorHandler($errno, $errstr, $errfile, $errline, $context) // Permet de catcher les erreurs php
{
	echo "Erreur de l'application";
	// Mettre dans les logs
	// Envoyer un mail
}

