<?php
    include "Model/DBConfig.php";
    $db = new Database();
    $db->OpenCon();
    $db->CreateTable();

    if(isset($_GET['controller'])){
        $controller = $_GET['controller'];
    }else{
        $controller ='';
    }
    
    switch($controller){
        case'PostNews':{
            require_once('Controllers/PostNews/index.php');
        }
        default : {
            require_once('Controllers/PostNews/index.php');
        }
    }
?>