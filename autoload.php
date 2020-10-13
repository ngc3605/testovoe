<?php 


spl_autoload_register('my_load');

function my_load($class){
	include  __DIR__.'/'.str_replace('\\','/',$class).'.php';
}