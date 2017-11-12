<?php 
  class MyresepController extends BaseController{
    public function index()
    {
      $data = ['data' => ['data' => 'yo !']];

      echo $this->view('view/profile/index.php', $data);
      # code...
    }
    public function tambah()
    {
      echo $this->view('view/resep/tambah.php');
    }
  }
?>