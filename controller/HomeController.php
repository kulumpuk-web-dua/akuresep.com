<?php 
  class HomeController extends BaseController{
    public function index()
    {
      $data = [];
      $data['reseps'] = $this->getDataAsObject("SELECT resep.*, pengguna.nama_depan, pengguna.nama_belakang from resep LEFT JOIN pengguna ON pengguna.id=resep.pengguna_id ORDER BY resep.dibuat_pada DESC LIMIT 4");

      echo $this->view('view/home/index.php', $data);
      # code...
    }
    public function hello()
    {
      
      echo "IDud hello";
    }
  }
?>