<?php 
  class ProfileController extends BaseController{
    public function index()
    {
      
      $data = ['user'=> "user" ];

      echo $this->view('view/profile/index.php', $data);
      # code...
    }
    public function ubah()
    {
      $data = ['user' => ['data' => 'yo !']];

      echo $this->view('view/profile/index.php', $data);
    }
  }
?>