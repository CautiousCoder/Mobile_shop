<?php

class DBcontroller {
    //database connection properties
    protected $host = "localhost";
    protected $user = "root";
    protected $pass = "";
    protected $database = "mobileshop";

    //connection
    public $conn = null;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->database);
        if($this->conn->connect_error){
            echo "Fail". $this->conn->connect_error;
        }
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    //for close connection

    protected function closeConnection(){
        if ($this->conn != null) {
            $this->conn->close();
            $this->conn = null;
        }
    }

}
