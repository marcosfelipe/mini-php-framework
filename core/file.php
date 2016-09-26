<?php

function dir_contents($dir, &$results = array()){
    $files = scandir($dir);

    foreach($files as $key => $value){
        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
        if(!is_dir($path)) {
            $results[] = $path;
        } else if($value != "." && $value != "..") {
            dir_contents($path, $results);
            $results[] = $path;
        }
    }

    return $results;
}

function find_file($name){
	$files = dir_contents(DIR_BASE);
	foreach($files as $file){
		if(strpos($file, $name) !== false) return $file;
	}
}
