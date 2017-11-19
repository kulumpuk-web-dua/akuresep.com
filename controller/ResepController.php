<?php 
  class ResepController extends BaseController{
    public function index()
    {
      $data = ['data' => ['data' => 'yo !']];

      echo $this->view('view/home/index.php', $data);
      # code...
    }
    public function detail()
    {
      $data = [];

      echo $this->view('view/resep/detail.php', $data);
    }

    public function search()
    {
      $data = [];

      echo $this->view('view/home/search.php', $data);
    }
  }
?>