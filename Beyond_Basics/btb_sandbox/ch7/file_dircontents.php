<?php  

// Like fopen/fread/fclose
//opendir()
//readdir()
//closedir()

$dir = ".";
if(is_dir($dir)){
    if($dir_handle = opendir($dir)){
        while($filename = readdir($dir_handle)){ //includes private files, it has a listing for itself, it has a listing for its parent directory as well
            echo "filename: {$filename}<br />";
        }
        // use rewinddir($dir_handle) to start over
        closedir($dir_handle);
    }
}
echo "<hr />";

// scandir(): reads all filenames into an array
if(is_dir($dir)){
    $dir_array = scandir($dir);
    foreach($dir_array as $file){
        if(stripos($file, '.') > 0){ //Find the position of the first occurrence of a case-insensitive substring in a string
            echo "filename: {$file}<br />";
        }
    }
}
//not much shorter, but maybe less complicated
//makes things like reverse order much easier

?>