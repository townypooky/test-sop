<?php
/**
 * Test of my semantic programming
 *
 * I wanted to write a code like sentences although I often write like:
 *     $files = array_filter(Directory::scan('~/'), function($item){
 *         return $item->isFile() && preg_match((string)$item, '/\.php/i');
 *     });
 *     foreach($files as $file) echo "$file\n";
 *
 * Yea, I understand what the script is going to do, but it takes a sec
 * to get its purpose.
 *
 * This challenge is to check whether I can write the code like a sentence.
 *
 * @author TownyPooky
 */
namespace TownyPooky\Challenge\SOP;

/**
 * Class load rule
 */
spl_autoload_register(function($class_name){
    $dir = DIRECTORY_SEPARATOR;
    $path = strtr($class_name, '\\', $dir);
    $file = __DIR__ . $dir . 'classes' . $dir . $path . '.php';
    if(is_readable($file)){
        require_once $file;
    }
});

/**
 * Here is my challenge
 */
$files = new FileCollection();
$files->in('~/')->like('/\.php/i')->each(function($file){
    echo "$file\n";
});


/**
 * Read by a sentence
 */
$file = new File(__FILE__);
$lines = $file->read()->asList();
foreach($lines as $line) echo "$line\n";

/**
 * Write by a sentence
 */
$new_list = new StringCollection();
foreach($lines as $line) $new_list->add($line);
$new_list->write()->on('test.txt');