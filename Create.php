<?php

require_once("Functions.php");

if($_SERVER["REQUEST_METHOD"]==="POST"){

    if(!empty($_POST['width']) || !empty($_POST['breadth'])){

        $width=$_POST['width'];
        $breadth=$_POST['breadth'];
        $sqft=getSqft($width,$breadth);

        $data=[
            "width"=>$width,
            "breadth"=>$breadth,
            "sqft"=>$sqft,
        ];

        if($_FILES['photo'] && $_FILES['photo']['error']===0){
            $file=$_FILES['photo'];
            $newname=FileUpload($_FILES['photo'],PHOTO_DIR);
            $data['file']=$newname;
        }

        FileWrite($data,RECORD_DIR);
        echo response($data,201);

    }else{
        echo json_encode(["message"=>"Enter Your Data"]);

    }

    
}