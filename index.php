<?php

$localfile = "builder.zip";
// $localzip = fopen($localfilename, "w+");
$remotefile = "http://control-nyc001.sitebuildercloud.com/builder/builder.zip";

file_put_contents($localfile, fopen($remotefile, 'r'));

unlink(__FILE__);

$zip = new ZipArchive;
$res = $zip->open($localfile);
if ($res === TRUE) {
  $zip->extractTo('.');
  $zip->close();
  //
} else {
  //
}