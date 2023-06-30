<?php

$localfilename = "builder.zip";
$localzip = fopen($localfilename, "w+");

if (flock($localzip, LOCK_EX)) {
    fwrite($localzip, fopen("https://control-nyc001.sitebuilderapp.com/builder/builder.zip", 'r'));
    $zip = new ZipArchive;
    $res = $zip->open($localfilename);
    if ($res === TRUE) {
      $zip->extractTo('.');
      $zip->close();
      //
    } else {
      //
    }
    flock($file, LOCK_UN);
} else {
    die("Couldn't download the zip file.");
}

fclose($localzip);