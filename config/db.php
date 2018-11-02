<?php 
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Not connected.");

if (mysqli_connect_errno()) {
    echo 'Failed to connect' . mysqli_connect_errno();
}

class databases
{
public $conn;
public $error;

public function __construct(){
    $this->conn = mysqli_connect("localhost", "root", "", "MarktPlein") or die("Not connected.") ;
    if(!$this->conn){
        echo 'Database Connection Error' .mysqli_connect_error($this->conn);
        
    }
}
    public function required_validation($field)
    {
        $count = 0;
        foreach ($field as $key => $value) {
            if (empty($value)) {
                $count++;
                $this->error = "<p>" . $key . "is required</p>";
            }
            if ($count == 0) {
                return true;
            }

        }
    }
    public function can_login($table_name, $where_condition)
    {
        $condition = '';
        foreach($where_condition as $key => $value){
            $condition .= $key . " = '" . $value . "' AND ";
           
        }
    $condition = substr($condition, 0, -5);
    $table_name = 'gebruikers';
    $query = "SELECT * FROM ".$table_name." WHERE " . $condition;
    $result = mysqli_query($this->conn, $query);
    if(mysqli_num_rows($result)){
        return true;
    } else {
        $this->error = "Wrong Data";
    }
    }
}
?>