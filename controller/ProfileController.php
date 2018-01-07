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

      $page =  isset($_GET['page']) ? $_GET['page'] : '1';
      $offset =  isset($_GET['offset']) ? $_GET['offset'] : '8';
      $page =  ($page - 1) * $offset;
      $data = [
        'user'=> "user",
        'resepSaya' => $this->getDataAsObject("SELECT resep.*, pengguna.nama_depan, pengguna.nama_belakang  ,
        (select max(gambar)  from detail_gambar where id_resep = resep.id and utama = '1') as gambar_utama
        from resep LEFT JOIN pengguna ON pengguna.id=resep.id_pengguna WHERE id_pengguna = '$userdata[0]' limit $page, $offset")
      ];
      $data['pagination'] = $this->getPaginationStatus('resep', '8',"WHERE id_pengguna = '$userdata[0]'");

      echo $this->view('view/profile/index.php', $data);
      # code...
    }
  }
?>