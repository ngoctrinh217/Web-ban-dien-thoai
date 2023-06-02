<?php
class Db
{
    private $host = 'localhost';
    private $servername = 'root';
    private $pwd = 'Diplamtuan123.';
    private $dbName = 'doanweb2';
    protected $conn;
    protected function connect()
    {
        $conn = mysqli_connect($this->host, $this->servername, $this->pwd, $this->dbName);
        if (!$conn->connect_errno) {
            return $conn;
        } else {
            echo "Failed to connect to MySQL: " . $conn->connect_error;
            exit();
        }
    }


    protected function close()
    {
        return mysqli_close($this->conn);
    }
}
