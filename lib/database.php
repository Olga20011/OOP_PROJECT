<?php
class Database{
    private $host ="localhost";
    private $user = "root";
    private $pass = "";
    private $name = "joblister";
    private $error;
    private $stmt;

    public $conn;

    public function __construct(){
        $this->conn = new mysqli($this->host ,$this->user, $this->pass,$this->name);

        if ($this->conn->connect_error){
            die("Connection failed:". $this->conn->connect_error);
        }

    }

    public function query($query){
        $this->stmt  = $this->conn->prepare($query);
    }

    // binding values
    public function bind($param , $value , $type = null){

        if(is_null($type)){
            switch (true) {
                case is_int($value):
                    $type .= 'i' ;
                    break;
                case is_bool($value):
                    $type .= 'b' ;
                    break;
                case is_null($value):
                    $type .= 'n' ;
                    break;
                default:
                    $type .= 's' ;
            }
        }
        $this->stmt->bindValue($param ,$value, $type);

    }
    public function execute(){
        return $this->stmt->execute();
    }
    public function resultSet(){
        $this->execute();
        return $this->stmt->get_result()->fetch_object();
    }
    public function single(){
        $this->execute();
        return $this->stmt->get_result()->fetch_object(); 

    }

}
?>