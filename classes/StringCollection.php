<?php
namespace TownyPooky\Challenge\SOP;

/**
 * Class StringCollection
 * @package TownyPooky\Challenge
 */
class StringCollection extends Collection
{
    /**
     * Apply a filter to the collection to remove wrong patterns.
     *
     * @param string $preg_exp Regular expression for preg_match()
     * @return StringCollection New instance applied the filter
     * @see preg_match()
     */
    public function like($preg_exp){
        $new_collection = new self();
        $this->each(function($elem, Collection $collection, $exp, StringCollection $new_collection){
            if(preg_match($exp, $elem)) $new_collection->add($elem);
            return true; // always returns true
        }, [$preg_exp, $new_collection]);
        return $new_collection;
    }


    /**
     * Write the strings
     *
     * @return FileWriter
     */
    public function write(){
        $writer = new FileWriter();
        $writer->setLineProvider(array($this, 'each'));
        return $writer;
    }
}