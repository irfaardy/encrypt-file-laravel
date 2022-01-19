<?php
namespace Irfa\FileSafe\Security;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Irfa\FileSafe\Security\File;

class CryptFile extends File
{
	private static $file;
	protected static function encrypt($file,$filename){
		$fileContent = $file->get();
		self::$file = $file;
		$encryptedContent = Crypt::encrypt($fileContent);
		self::store_file(self::GenerateFileName($filename),$encryptedContent);

		self::$file = null;


	}

	protected static function decrypt($file,$raw=false){
		$fl = self::get_file($file);
		$decryptedContent = Crypt::decrypt($fl);
		if($raw){
			$raw = $decryptedContent;
			return $raw;
		} else{

			return response()->streamDownload(function() use ($decryptedContent) {
					    echo $decryptedContent;
					}, $file);
		}
	}
	private static function GenerateFileName($filename=null){
		if(config("irfa.filesafe.random_filename")){
			$rand = time()."_".Str::random(20).".".self::$file->getClientOriginalExtension();
		} else{
			$rand = self::$file->getClientOriginalName();
		}
		if(!empty($filename))
		{
			$rand = $filename;
		}
		return $rand;
	}



}
