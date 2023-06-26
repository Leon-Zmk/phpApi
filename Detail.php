<?php

require_once("Functions.php");

if(!empty($_GET['file'])){

    if(file_exists(RECORD_DIR.$_GET["file"])){

        $file=$_GET['file'];
        $data=json_decode(getContent(RECORD_DIR,$file));

         echo response($data,200);
    }else{
        echo response(["message"=>"There is no such File"],404);

    }

}else{
    echo response(["message"=>"Please Enter Your File"],404);
}