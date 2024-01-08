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
   // Inside Database class
   public function bind($params = array()) {
    $types = ''; // Initialize $types here
    $bindParams = array();

    foreach ($params as $param) {
        if (is_int($param)) {
            $types .= 'i'; // Integer type
        } elseif (is_float($param)) {
            $types .= 'd'; // Double type
        } elseif (is_string($param)) {
            $types .= 's'; // String type
        } else {
            $types .= 'b'; // Blob type
        }

        $bindParams[] = $param;
    }

    // Dynamically bind parameters
    $bindArgs = array_merge(array($types), $bindParams);
    call_user_func_array(array($this->stmt, 'bind_param'), $this->refValues($bindArgs));
}
// Add this helper method to handle references for bind_param
private function refValues($arr){
    $refs = array();
    foreach ($arr as $key => $value) {
        $refs[$key] = &$arr[$key];
    }
    return $refs;
}

    public function execute(){
        return $this->stmt->execute();
    }
    public function resultSet(){
        $this->execute();
        return $this->stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    public function single(){
        $this->execute();
        return $this->stmt->get_result()->fetch_object(); 

    }

}
?>