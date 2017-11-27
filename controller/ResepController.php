<?php 
  if(!defined("YO")) die();
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
      $idResep = $_GET['id'];
      $data['resep'] = $this->getDataAsObject("SELECT resep.*, pengguna.nama_depan, pengguna.nama_belakang, kategori.nama as nama_kategori from resep 
        LEFT JOIN kategori ON kategori.id=resep.id_kategori 
        LEFT JOIN pengguna ON pengguna.id=resep.id_pengguna 
        WHERE resep.id = '$idResep'");
      echo $this->view('view/resep/detail.php', $data);
    }

    public function search()
    {
      $data = [];
      $_GET['search'] = isset($_GET['search']) ? $_GET['search'] : $_POST['search']; 
      $search = $_GET['search'];
      $data['reseps'] = $this->getDataAsObject("SELECT resep.*, pengguna.nama_depan, pengguna.nama_belakang from resep LEFT JOIN pengguna ON pengguna.id=resep.id_pengguna WHERE resep.nama like '%$search%' OR pengguna.nama_depan like '%$search%' OR pengguna.nama_belakang like '%$search%'");

      echo $this->view('view/home/search.php', $data);
    }
  }
?>