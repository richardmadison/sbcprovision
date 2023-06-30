<?php

$localfile = "builder.zip";
// $localzip = fopen($localfilename, "w+");
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
unlink(".git");
unlink(".gitattributes");