<?php

require_once("Globals.php");



function dd(mixed $data):void{
    echo "<pre style='background-color:black;padding:100px;color:white;'>";
    print_r($data);
    echo "</pre>";
}

function logger(string $logdata):void{
    echo "\e[39m[LOG]"."\e[32m".$logdata."\n";
}

function response(mixed $data,int $status = 200):string{

    header("Content-Type:application/json");
    http_response_code($status);

    if(is_array($data)){
          return json_encode($data);
    }
    return json_encode(["message" => $data]); 
}

function getSqft(int $width,int $breadth):int{

    $sqft=$width*$breadth;
    return $sqft;
}

function newName(string $ext="text"):string{

    $newname=uniqid()."_".uniqid()."_." ."$ext";
    return $newname;
}

function getExtension(array $file):string{
    $ext=pathinfo($file['name'])['extension'];
    return $ext;
}

function FileWrite(mixed $data,string $path):void{
    
    $newname=newName("json");
    $fp=fopen($path.$newname,"w+");
    fwrite($fp,json_encode($data));
    fclose($fp);
}

function FileUpload(array $file,string $path):string{

    $tmp=$file['tmp_name'];
    $name=$file['name'];
    $ext=getExtension($file);
    $newname=newName($ext);
    move_uploaded_file($tmp,$path.$newname);

    return $newname;

}

function getFiles(string $dir):array{

    $files=scandir($dir);
    $files=array_filter($files,fn ($e) => $e != "." && $e != "..");
    return $files;

}

function getContent(string $dir,string $file):string{

    $data=file_get_contents($dir.$file);
    return $data;
}


