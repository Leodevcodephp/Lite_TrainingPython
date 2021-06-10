<?php
Class database{
    private $hostname= 'localhost'; 
    private $username = 'root';
    private $pwd = '';
    private $dbname = 'trainingphp';

    private $conn = null;
    private $rs = null;

    public function OpenCon(){
        $this->conn =  new mysqli($this->hostname, $this->username, $this->pwd, $this->dbname) or die(" Connection fail: " . $this->conn->connect_error);
        return $this->conn;
    }

    public function CreateTable(){
        $sql =  "CREATE TABLE IF NOT EXISTS posttable (
            id int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title varchar(250),
            description text,
            image varchar(250), 
            status int,
            create_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
            updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP AFTER created_at
            )";
    }
    
    //get data
    public function getData(){
        if($this->rs){
            $data= mysqli_fetch_array($this->rs);
        }
        else{
            $data=[];
        }
        return $data;
    }

   public function getAllData($tbl){
        $sql  = "SELECT * FROM $tbl";
        
        $this->rs = $this->conn->query($sql);
        if($this->rs->num_rows == 0){
            $dataAll = [];
        }
        else{
            $dataAll = $this->rs->fetch_all(MYSQLI_ASSOC);
        }
        return $dataAll;
    }

    public function getLimit($tbl, $start, $limit){

        $sql = "SELECT * FROM $tbl LIMIT $start, $limit";

        $this->rs = $this->conn->query($sql);
        if($this->rs->num_rows == 0){
            $dataLimit = [];
        }
        else{
            $dataLimit = $this->rs->fetch_all(MYSQLI_ASSOC);
        }
        return $dataLimit;
    }

    public function countTotal(){
        $sql = "SELECT count(id) AS id FROM datatestphp";

        $this->rs = $this->conn->query($sql);
        $dataTotal = $this->rs->fetch_all(MYSQLI_ASSOC);
        $total = $dataTotal[0]['id'];
        return $total;
    }

    public function getDataID($id){
        $sql =  "SELECT * FROM datatestphp WHERE id = '$id'";
        return  $this->conn->query($sql);
    }

    public function InsertData($title, $desc, $image, $status){
        $sql = "INSERT INTO datatestphp(id,title,description,image,status,create_at,updated_at) VALUES (null, '$title', '$desc', '$image', '$status', null, '')";
        return $this->conn->query($sql);
    }

    public function UpdateData($id, $title, $desc, $image, $status){
        $sql = "UPDATE datatestphp SET title='$title' , description ='$desc', image='$image', status='$status', create_at=null, updated_at=null WHERE id='$id'";
        return $this->conn->query($sql);
    }

    public function DelData($id){
        $sql = "DELETE FROM datatestphp WHERE id ='$id'";
        return $this->conn->query($sql);
    }
    public function Close(){
        $this->conn->Close;
    }
}
?>