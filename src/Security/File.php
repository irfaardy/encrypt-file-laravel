<?php 
namespace Irfa\FileSafe\Security;

use Irfa\FileSafe\Security\CryptFile;
use Illuminate\Support\Facades\Storage;


class File {
	protected static function store_file($randomname,$encryptedContent){
		$path = config("irfa.filesafe.path");
		Storage::disk('local')->put($path.$randomname, $encryptedContent);
	}
	protected static function get_file($filename){
		$path = config("irfa.filesafe.path");
		return Storage::disk('local')->get($path.$filename);
	}


}
