<?php
namespace iplib; //L'autoload est crיי dans le composer 

class Error
{
	public function handleError($errno, $errstr, $errfile, $errline, $context)
	{
		echo 'Erreur de l\'application';
	}
	
	
	public function handleException(Exception $e)
	{
		echo 'Erreur de l\'application';
	}
}