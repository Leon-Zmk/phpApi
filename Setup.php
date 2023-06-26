<?php

require_once("Functions.php");


if(!is_dir(PHOTO_DIR)){
    mkdir(PHOTO_DIR);
    logger("Photo Folder Created");

}

if(!is_dir(RECORD_DIR)){
    mkdir(RECORD_DIR);
    logger("Record Folder Created");

}