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
      $query = "SElECT * FROM kategori";
      $data =  $this->getDataAsObject($query);
      
      $viewData = ['listKategori' => $data];
      echo $this->view('view/resep/tambah.php', $viewData);
    }
    
    public function postTambah()
    {
      $nama = $_POST['nama'];
      $porsi = $_POST['porsi'];
      $durasi = $_POST['durasi'];
      $deskripsi = $_POST['deskripsi'];
      $tag = $_POST['tag'];

      $id_user = 1;
      $id_kategori = $_POST['kategori'];


      
      $query = "
        INSERT INTO `resep` (`id_pengguna`, `id_kategori`, `nama`, `porsi`, `durasi`, `deskripsi`, `tag`) 
        VALUES ('$id_user','$id_kategori','$nama', '$porsi', '$durasi', '$deskripsi', '$tag');
      
      ";
      $data =  $this->executeQuery($query);

      if($data){
        header('location:index.php?c=myresep&m=index');
      }
      
    }
    
  }
?>