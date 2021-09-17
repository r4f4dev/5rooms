<?php 


function autoloader($class){
	require __DIR__. '/' .str_replace('\\', '/', $class . '.php');
}

spl_autoload_register('autoloader');