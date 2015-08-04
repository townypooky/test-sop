<?php
/**
 * Created by PhpStorm.
 * User: ohtamasato
 * Date: 15/08/04
 * Time: 18:06
 */

namespace TownyPooky\Challenge\SOP;


class FileWriter
{
    /**
     * @var callable
     */
    private $line_provider;

    /**
     * @param string $file
     * @return bool
     */
    public function on($file){
        if($fp = \fopen($file, 'w')) {
            $is_okay = call_user_func_array($this->line_provider, [function($line, $fp){
                return fwrite($fp, "$line\n");
            }, [$fp]]);
            fclose($fp);
            return $is_okay ? true : false;
        }else{
            return false;
        }

    }

    /**
     * Set the callable to provide lines to write on a file
     *
     * @param callable $line_provider
     */
    public function setLineProvider(callable $line_provider){
        $this->line_provider = $line_provider;
    }
}