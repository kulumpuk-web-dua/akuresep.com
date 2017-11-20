<?php 
  class ProfileController extends BaseController{
    public function index()
    {
      
      $userdata = $_SESSION['loginedUserDetail'][0];
      $data = [
        'user'=> "user",
        'resepSaya' => $this->getDataAsObject("SELECT * FROM resep WHERE id_pengguna = '$userdata[0]' limit 0, 8")
      ];

      echo $this->view('view/profile/index.php', $data);
      # code...
    }
  }
?>