<?php

require_once("Functions.php");

if(!empty($_POST['file'])){
    if(file_exists(RECORD_DIR.$_POST["file"])){

        $file=$_POST['file'];
        $data=json_decode(getContent(RECORD_DIR,$file),true);
        $photoname=$data['file'];

        unlink(PHOTO_DIR.$photoname);
        unlink(RECORD_DIR.$file);

        echo response(["message"=>"File Deleted"],200);

    }else{
        echo response(["message"=>"There is no such File"],404);

    }

}else{
    echo response(["message"=>"Please Enter Your File"],404);
}