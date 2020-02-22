<?php 
namespace Irfa\FileSafe\Security;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Irfa\FileSafe\Security\File;

class CryptFile extends File
{
	private static $file;
	protected static function encrypt($file){
		$fileContent = $file->get();
		self::$file = $file;
		$encryptedContent = Crypt::encrypt($fileContent);
		self::store_file(self::GenerateFileName(),$encryptedContent);

		self::$file = null;

		
	}

	protected static function decrypt($file){
		$fl = self::get_file($file);
		$decryptedContent = Crypt::decrypt($fl);

		return response()->streamDownload(function() use ($decryptedContent) {
		    echo $decryptedContent;
		}, $file);
	}
	private static function GenerateFileName(){
		if(config("irfa.filesafe.random_filename")){
			$rand = time()."_".Str::random(20).".".self::$file->getClientOriginalExtension();
		} else{
			$rand = self::$file->getClientOriginalName();
		}
		return $rand;
	}

	

}