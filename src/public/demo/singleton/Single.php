<?php 

class Single { //Pour ne pas avoir deux instance d'une même classe
	
	private static $instance; 
	
	final private function __construct() // On évite l'implémentation de la classe
	{
		
	}
		
	public static function getInstance()
	{
		$class = get_called_class(); // Permet de traiter le cas de l'héritage
		
		if(!isset(self::$_instance[$class])) 
		{
			self::$_instance[$class] = new $class();
		}
		return self::$_instance[$class];
	}
	
	final private function __clone() // On évite le clonage de la classe
	{
		trigger_error('Clonage Interdit', E_USER_ERROR);
	}
}
