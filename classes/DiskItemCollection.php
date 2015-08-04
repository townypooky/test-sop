<?php
namespace TownyPooky\Challenge\SOP;


/**
 * Class DiskItemCollection
 * @package TownyPooky\Challenge
 */
class DiskItemCollection extends StringCollection
{
    /**
     * Directory path if the collection elements are commonly in it.
     *
     * @var string|null
     */
    private $dir;

    /**
     * Error code when something gets wrong
     *
     * @var int
     */
    private $error;

    /**
     * Unreachable data source path
     *
     * @var int
     */
    const E_BAD_SOURCE = 1;

    public function __construct(){
        parent::__construct();
        $this->error = 0;
        $this->dir = null;
    }

    /**
     * Load the names of the sub items in the directory
     *
     * @param string $dir directory path
     * @return DiskItemCollection
     */
    public function in($dir){
        $new_collection = new self();
        $new_collection->dir = $dir;
        if($items = @scandir($dir)){
            $children = array_diff($items, ['.', '..']);
            foreach($children as $child){
                $new_collection->add($child);
            }
        }else{
            $new_collection->error = self::E_BAD_SOURCE;
        }
        return $new_collection;
    }
}