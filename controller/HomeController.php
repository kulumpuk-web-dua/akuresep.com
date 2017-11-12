<?php 
  class HomeController extends BaseController{
    public function index()
    {
      $data = ['data' => ['data' => 'yo !']];

      echo $this->view('view/home/index.php', $data);
      # code...
    }
    public function hello()
    {
      
      echo "IDud hello";
    }
  }
?>