<?php
include('Model/Helper.php');
if(isset($_GET['action'])){
    $action  = $_GET['action'];
}
else{
    $action ='';
}

$helper = new helper;
$tbl = "datatestphp";
$dt = $db->getAllData($tbl);

switch($action){
    case'add':{
        if(isset($_POST['addPost'])){

            $statusMsg = '';

            if (isset($_POST["addPost"]) && $helper->Upload($_FILES)) {
                $title = $_POST['title'];
                $desc =  $_POST['desc'];
                $option = $_POST['choose'];
                $fileName = basename($_FILES["file"]["name"]);
                $insert = $db->InsertData ($title, $desc, $fileName, $option);
                if($insert){
                    $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                    header('location: index.php?controller=PostNews&action=home');
                }else{
                    $statusMsg = "File upload failed, please try again.";
                }
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
            echo $statusMsg;
        }
        require_once('Views/add.php');
        break;
    }

    case'edit':{
        if(isset($_GET['id'])){
            $id= $_GET['id'];
            $dataID = $db->getDataID($id);
            $data = mysqli_fetch_array($dataID);

            if(isset($_POST['editPost'])){
                // get data from view
                if ($helper->Upload($_FILES)) {
                    $title = $_POST['title'];
                    $desc =  $_POST['desc'];
                    $option = $_POST['choose'];
                    $fileName = basename($_FILES["file"]["name"]);
                    $edit = $db->UpdateData ($id, $title, $desc, $fileName, $option);
                    if($edit){
                        header('location: index.php?controller=PostNews&action=home');
                    }  
                }
            }
        }
        require_once('Views/edit.php');
        break;
    }

    case'delete':{
        if (isset($_GET['id'])){
            $id= $_GET['id'];
            if($db->DelData($id)){
                header('location: index.php?controller=PostNews&action=home');
            }
        }else{
            header('location: index.php?controller=PostNews&action=home');     
        }
        break;
    }

    case'home':{
        $tbl = "datatestphp";
        $limit = (int)(isset($_POST['limit-records']) ? $_POST['limit-records'] : 1);
        $page = (int)(isset($_GET['page']) ? $_GET['page'] : 1);
        $start = ($page - 1) * $limit;
        $afk = $db->getLimit($tbl,$start,$limit);
        $total = $db->countTotal();
        $pages = ceil( $total / $limit );
        $Previous = $page - 1;
        $Next = $page + 1;
        
        require_once('Views/home.php');
        break;
    }

    case 'list':{
        require_once('Views/list.php');
        break;
    }

    case 'show':{
        require_once('Views/show.php');
        break;
    }

    default:{
        require_once('Views/home.php');
        break;
    }
}

?>