<?php 
namespace Irfa\FileSafe\Func;


use Irfa\FileSafe\Func\File;

class FileSafe extends File
{

	public static function store($file){
		self::upload($file);
	}

	public static function download($file){
		return self::download_file($file);
	}


}