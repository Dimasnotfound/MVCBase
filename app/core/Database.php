<?php

class Database {
    private $host;
    private $db;
    private $user;
    private $pass;
    private $conn;

    public function __construct(){
        $env = parse_ini_file('../.env');
        $this->host = $env['DB_HOST'];
        $this->db   = $env['DB_NAME'];
        $this->user = $env['DB_USER'];
        $this->pass = $env['DB_PASS'];
    }

    public function connect(){
        try {
            $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            echo "Koneksi database gagal: " . $e->getMessage();
        }
    }
}
