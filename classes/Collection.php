<?php
namespace TownyPooky\Challenge\SOP;

/**
 * Class Collection
 * @package TownyPooky\Challenge
 */
class Collection
{
    /**
     * Simple list of elements of the collection
     *
     * @var mixed[]
     */
    private $storage;

    /**
     * Proceed each element of the collection
     *
     * @param callable $on_each  function to call for each element
     * @param array    $args     optional array
     * @return bool   False when the callback is aborted by returning false
     */
    public function each(callable $on_each, array $args=[]){
        foreach($this->storage as $elem){
            if(call_user_func_array($on_each, array_merge([$elem], $args)) === false){
                return false;
            }
        }
        return true;
    }

    /**
     * Add an element to the collection
     *
     * @param mixed $elem Element may be inserted at the last position of the collection
     */
    public function add($elem){
        $this->storage[] = $elem;
    }
}