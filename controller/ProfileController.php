<?php 
  class ProfileController extends BaseController{
    public function index()
    {
      $data = ['data' => ['data' => 'yo !']];

      echo $this->view('view/profile/index.php', $data);
      # code...
    }
    public function hello()
    {
      
      echo "IDud hello";
    }
  }
?>