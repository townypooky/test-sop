# Test of my semantic programming
I wanted to write a code like sentences although I often write like:

```php
$files = array_filter(Directory::scan('~/'), function($item){
    return $item->isFile() && preg_match((string)$item, '/\.php/i');
});
foreach($files as $file) echo "$file\n";
```

Yea, I understand what the script is going to do, but it takes a sec
 to get its purpose.

This challenge is to check whether I can write the code like a sentence.


## Goals

To find files of "*.php" and echo the name for each:
```php
$files->in('~/')->like('/\.php/i')->each(function($file){
    echo "$file\n";
});
```

To get the lines on the file:
```php
$lines = $file->read()->asList();
```

To write lines on a file:
```php
$lines1->write()->on('test.txt');
```

## So, what ?
Nuthin' at all.
