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
      $search = $_GET['search'];
      $data['reseps'] = $this->getDataAsObject("SELECT resep.*, pengguna.nama_depan, pengguna.nama_belakang from resep LEFT JOIN pengguna ON pengguna.id=resep.pengguna_id WHERE resep.nama like '%$search%' OR pengguna.nama_depan like '%$search%' OR pengguna.nama_belakang like '%$search%'");

      echo $this->view('view/home/search.php', $data);
    }
  }
?>