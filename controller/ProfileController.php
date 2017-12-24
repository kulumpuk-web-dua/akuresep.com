<?php 
  if(!defined("YO")) die();
  class ProfileController extends BaseController{
    public function index()
    {
      $userdata = null;
      if(!isset($_GET['user'])){
        $userdata = $_SESSION['loginedUserDetail'][0];
      } else {
        $user = $_GET['user'];
        $userdata = $this->getDataAsArray("SElECT * FROM pengguna WHERE id = '$user'")[0];
      }
      $data = [
        'user'=> "user",
        'resepSaya' => $this->getDataAsObject("SELECT resep.*, pengguna.nama_depan, pengguna.nama_belakang  ,
        (select max(gambar)  from detail_gambar where id_resep = resep.id and utama = '1') as gambar_utama
        from resep LEFT JOIN pengguna ON pengguna.id=resep.id_pengguna WHERE id_pengguna = '$userdata[0]'")
      ];

      echo $this->view('view/profile/index.php', $data);
      # code...
    }
  }
?>