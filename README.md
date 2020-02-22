
# 🚀Simple Laravel Encrypt Upload File
[![GitHub license](https://img.shields.io/github/license/irfaardy/raja-ongkir?style=flat-square)](https://github.com/irfaardy/raja-ongkir/blob/master/LICENSE) [![Support me](https://img.shields.io/badge/Support-Buy%20me%20a%20coffee-yellow.svg?style=flat-square)](https://www.buymeacoffee.com/OBaAofN)
<h3>🛠️ Installation with Composer </h3>

    composer require irfa/raja-ongkir

>You can get Composer [ here]( https://getcomposer.org/download/)

***


<h2>🛠️ Laravel Setup </h2>

<h3>Add to config/app.php</h3>

    'providers' => [
        ....
        Irfa\FileSafe\FileSafeServiceProvider::class,
         ];



<h3>Add to config/app.php</h3>

    'aliases' => [
             ....
      'FileSafe' => Irfa\FileSafe\Facades\FileSafe::class,
    
        ],

  <h2>Publish Vendor</h2>


    php artisan vendor:publish --tag=file-safe

<h2>Config File</h2>

    config/irfa/filesafe.php

<h2>Example store file</h2>


    <?php
    
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    
    class FileController extends Controller
    {
       
        public function upload_file(Request $request)
        {
           $file = $request->file('file');
           FileSafe::store($file);
    //
        }
    }

<h2>Example download file</h2>


    <?php
    
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    
    class FileController extends Controller
    {
       
        public function upload_file(Request $request)
        {
           $file = 'images.jpg';
           return FileSafe::download($file);
    //
        }
    }

