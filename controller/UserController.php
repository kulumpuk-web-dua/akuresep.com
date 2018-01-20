<?php 
  if(!defined("YO")) die();
  class UserController extends BaseController{
    public function index()
    {
      $data = [];

      $data['user'] = $this->getDataAsObject("SELECT * FROM pengguna where id=".get('profile'))[0];

      $query = "SELECT resep.*, pengguna.nama_depan, pengguna.nama_belakang, pengguna.pekerjaan  ,
      (select max(gambar)  from detail_gambar where id_resep = resep.id and utama = '1') as gambar_utama
      from resep LEFT JOIN pengguna ON pengguna.id=resep.id_pengguna WHERE id_pengguna=".get('profile');

      $data['reseps'] = $this->getDataAsObject("$query ORDER BY resep.dibuat_pada DESC");

      echo $this->view('view/home/user.php', $data);
      # code...
    }
    
  }
?>