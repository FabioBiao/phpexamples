 
<?php
class Database{
 
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "testingstuff";
    private $username = "root";
    private $password = "";
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;

        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        return $this->conn;
    }
}
?>