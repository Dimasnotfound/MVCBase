<?php

class HomeController extends Controller {
    public function index(){
        // Contoh penggunaan koneksi database
        $db = new Database();
        $conn = $db->connect();
        // Contoh query (sesuaikan dengan kebutuhan)
        // $stmt = $conn->prepare("SELECT * FROM table_name");
        // $stmt->execute();
        // $dataResult = $stmt->fetchAll();

        $data = [
            'title' => 'Home Page'
            // 'result' => $dataResult
        ];

        // Tampilkan view 'home' dengan data yang dikirim
        $this->view('home', $data);
    }
}
