<?php

function recursiveRemoveDirectory($directory)
{
    foreach(glob("{$directory}/*") as $file)
    {
        if(is_dir($file)) { 
            recursiveRemoveDirectory($file);
        } else if(!is_link($file)) {
            unlink($file);
        }
    }
    rmdir($directory);
}

$localfile = "builder.zip";
$remotefile = "http://control-nyc001.sitebuildercloud.com/builder/builder.zip";

file_put_contents($localfile, fopen($remotefile, 'r'));

unlink(__FILE__);

$path = getcwd();
$all = explode("/",$path);
$size = sizeof($all);
$folder = "../" . $all[$size - 1];

$zip = new ZipArchive;
$res = $zip->open($localfile);
if ($res === TRUE) {
  $zip->extractTo($folder);
  $zip->close();
  //
} else {
  //
}

unlink($localfile);
recursiveRemoveDirectory(".git");
unlink(".gitattributes");

