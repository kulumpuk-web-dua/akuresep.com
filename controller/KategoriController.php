<?php 
  if(!defined("YO")) die();
  class KategoriController extends BaseController{
    public function index()
    {
      $data = [];

      echo $this->view('view/kategori/list.php', $data);
      # code...
    }
    public function detail()
    {
      $data = [];

      echo $this->view('view/kategori/detail.php', $data);
    }
  }
?>