<?php
namespace App\Controllers;

class Mahasiswa extends BaseController{
    public function index(){
        echo "pabw";
    }
    public function ucapan(){
        //echo "Selamat malam";
        //return view("hello");
        //bisa mengembalikan lebih dari 1
        //$data['n']=$this->request->getGet('nama');
        $data['n']=$this->request->getPost('nama');
        echo view("hello",$data);
    }
}
?>