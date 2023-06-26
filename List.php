<?php

require_once("Functions.php");

$files=getFiles(RECORD_DIR);
$datas=[];
foreach($files as $file){
    $data=json_decode(getContent(RECORD_DIR,$file),true);
    $data["filename"]=$file;
    array_push($datas,$data);
};

echo response($datas,200);

