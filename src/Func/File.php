<?php
namespace Irfa\FileSafe\Func;

use Irfa\FileSafe\Security\CryptFile;
use Illuminate\Support\Facades\Storage;

class File extends CryptFile
{

	protected static function upload($file,$filename){
		return CryptFile::encrypt($file,$filename);
	}
	protected static function download_file($file){
		return CryptFile::decrypt($file);
	}
	protected static function view_raw($file){
		return CryptFile::decrypt($file,true);
	}


}
