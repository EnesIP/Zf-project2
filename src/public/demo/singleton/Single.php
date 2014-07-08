<?php 

class Single { //Pour ne pas avoir deux instance d'une m�me classe
	
	private static $instance; 
	
	final private function __construct() // On �vite l'impl�mentation de la classe
	{
		
	}
		
	public static function getInstance()
	{
		$class = get_called_class(); // Permet de traiter le cas de l'h�ritage
		
		if(!isset(self::$_instance[$class])) 
		{
			self::$_instance[$class] = new $class();
		}
		return self::$_instance[$class];
	}
	
	final private function __clone() // On �vite le clonage de la classe
	{
		trigger_error('Clonage Interdit', E_USER_ERROR);
	}
}
