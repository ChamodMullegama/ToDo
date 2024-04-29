<?php

namespace domain\Facades;

use domain\Services\FileService;
use Illuminate\Support\Facades\Facade;

class FileFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return FileService::class;
    }
}

?>
