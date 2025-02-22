<?php

class HomeController extends Controller {
    public function index(){
        // Contoh penggunaan koneksi model
        // $userModel = new UserModel();
        // $users = $userModel->getAllUsers();


        $data = [
            'title' => 'Home Page',
            // 'result' => $users
            // jika memiliki css dan js tambahkan seperti berikut
            'css' => ['home.css'],
            'js'  => ['home.js']
        ];

        // Tampilkan view 'home' dengan data yang dikirim
        $this->view('home/index', $data);
    }
}
