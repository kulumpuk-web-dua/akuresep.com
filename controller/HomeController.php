<?php 
  if(!defined("YO")) die();
  class HomeController extends BaseController{
    public function index()
    {
      $data = [];
      $data['reseps'] = $this->getDataAsObject("SELECT resep.*, pengguna.nama_depan, pengguna.nama_belakang from resep LEFT JOIN pengguna ON pengguna.id=resep.id_pengguna ORDER BY resep.dibuat_pada DESC LIMIT 0,4");
      $data['kategories'] = $this->getDataAsObject("SELECT * from kategori ORDER BY kategori.id DESC LIMIT 0,4");

      echo $this->view('view/home/index.php', $data);
      # code...
    }
    public function hello()
    {
      
      echo "IDud hello";
    }
  }
?>