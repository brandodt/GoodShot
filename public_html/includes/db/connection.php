<?php

class Database
{
    private $host = '127.0.0.1';
    private $db = 'goodshot';
    private $user = 'root';
    private $pass = 'r00t@Dw4yn3';
    private $conn;

    public function connect()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        if ($this->conn->connect_error) {
            die("Connection Failed: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}
