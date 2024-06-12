<?php

class Database
{
    private $host = '127.0.0.1';
    private $db = 'goodshot';
    private $user = 'dwayne';
    private $pass = 'dw4yn3@g00dSh0t';
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
