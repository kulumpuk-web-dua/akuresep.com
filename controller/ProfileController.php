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
        'resepSaya' => $this->getDataAsObject("SELECT * FROM resep WHERE id_pengguna = '$userdata[0]' limit 0, 8")
      ];

      echo $this->view('view/profile/index.php', $data);
      # code...
    }
  }
?>