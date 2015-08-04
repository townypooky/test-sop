<?php
/**
 * Created by PhpStorm.
 * User: ohtamasato
 * Date: 15/08/04
 * Time: 17:53
 */

namespace TownyPooky\Challenge\SOP;


class File
{
    /**
     * File path
     *
     * @var string
     */
    private $path;

    public function __construct($path){
        $this->path = $path;
    }

    /**
     * Read and get the content
     *
     * @return FileContent
     */
    public function read(){
        return new FileContent(file_get_contents($this->path, false));
    }
}