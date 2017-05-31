<?php

namespace Gcd\Speculator\Rhubarb;

use Rhubarb\Crown\Response\Response;
use Rhubarb\Crown\UrlHandlers\UrlHandler;
use Rhubarb\Stem\Models\Model;
use Rhubarb\Stem\Repositories\Offline\Offline;
use Rhubarb\Stem\Repositories\Repository;

class SpeculatorUrlHandler extends UrlHandler
{

    /**
     * Return the response if appropriate or false if no response could be generated.
     *
     * @param mixed $request
     * @return bool|Response
     */
    protected function generateResponseForRequest($request = null)
    {
        Model::clearAllRepositories();
        Repository::setDefaultRepositoryClassName(Offline::class);

        chdir(APPLICATION_ROOT_DIR);
        $_SERVER["REQUEST_URI"] = preg_replace('/^'.str_replace("/", "\\/", $this->url).'/', '/', $_SERVER["REQUEST_URI"]);

        include VENDOR_DIR.'/gcdtech/speculator/src/speculator.php';
        exit;
    }
}