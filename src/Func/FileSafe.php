<?php
namespace Irfa\FileSafe\Func;

use Irfa\FileSafe\Func\File;

class FileSafe extends File
{
	private static $file;

	public static function file($file){
		 self::$file = $file;

		 return new static();
	}
	public static function store($file=null,$filename=null){
		if($file == null){
			$fl = self::$file;
		} else{
			$fl = $file;
		}
		self::upload($fl,$filename);
	}

	public static function download($file=null){
		if($file == null){
			$fl = self::$file;
		} else{
			$fl = $file;
		}
		return self::download_file($fl);
	}

	public static function raw($file=null){
		if($file == null){
			$fl = self::$file;
		} else{
			$fl = $file;
		}
		return self::view_raw($fl);
	}

}
