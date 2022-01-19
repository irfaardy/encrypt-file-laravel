<?php
/* 
	Author: Irfa Ardiansyah <irfa.backend@protonmail.com>
*/
namespace Irfa\FileSafe\Facades;

use Illuminate\Support\Facades\Facade;

class FileSafe extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Irfa\FileSafe\Func\FileSafe::class;
    }
}
