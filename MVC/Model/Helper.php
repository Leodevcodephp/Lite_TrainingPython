<?php
Class helper{

    public function Upload($file)
    {
        $targetDir = "Views/images/";
        $fileName = basename($file["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if(!empty($file["file"]["name"])){
            $allowTypes = array('jpg','png','jpeg','gif','pdf');
            if(in_array($fileType, $allowTypes)){
                return move_uploaded_file($file["file"]["tmp_name"], $targetFilePath);
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    
}
?>