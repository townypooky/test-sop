<?php
namespace TownyPooky\Challenge\SOP;


/**
 * Class FileContent
 * @package TownyPooky\Challenge\SOP
 */
class FileContent
{
    /**
     * Raw (string) value of the file content
     *
     * @var string|null
     */
    private $storage;

    public function __construct($content=null){
        $this->storage = $content;
    }

    /**
     * Get the content as string
     *
     * @return string
     */
    public function asString(){
        return is_string($this->storage) ? $this->storage : '';
    }

    /**
     * Get the content as string-list
     *
     * @param string $delim Delimiter for the content
     * @return string[]
     */
    public function asList($delim="\n"){
        return explode($delim, $this->asString());
    }
}