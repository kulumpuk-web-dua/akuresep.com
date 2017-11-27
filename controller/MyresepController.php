<?php 
  if(!defined("YO")) die();
  class MyresepController extends BaseController{
    public function index()
    {

      $userdata = $_SESSION['loginedUserDetail'][0];
      $data = [
        'user'=> "user",
        'resepSaya' => $this->getDataAsObject("SELECT * FROM resep WHERE id_pengguna = '$userdata[0]' limit 0, 8")
      ];

      echo $this->view('view/resep/index.php', $data);
      # code...
    }
    public function tambah()
    {
      $query = "SElECT * FROM kategori";
      $data =  $this->getDataAsObject($query);
      
      $viewData = ['listKategori' => $data];
      echo $this->view('view/resep/tambah.php', $viewData);
    }
    public function edit()
    {
      $query = "SElECT * FROM kategori";
      $data =  $this->getDataAsObject($query);
      
      $queryGetDetailResep = "SELECT * FROM resep WHERE id = '" . $_GET['id'] . "'";
      $queryGetDetailResep = $this->getDataAsObject($queryGetDetailResep)[0];
      $viewData = ['listKategori' => $data , 'instance' => $queryGetDetailResep];
      echo $this->view('view/resep/edit.php', $viewData);
    }
    
    public function delete()
    {
      $query = "DELETE FROM resep WHERE id = '" . $_GET['id'] . "'";
      $data =  $this->executeQuery($query);
      
      if($data){
        header('location:index.php?c=myresep&m=index');
      }
    }
    
    public function postTambah()
    {

      $userdata = $_SESSION['loginedUserDetail'][0];
      $nama = $_POST['nama'];
      $porsi = $_POST['porsi'];
      $durasi = $_POST['durasi'];
      $deskripsi = $_POST['deskripsi'];
      $tag = $_POST['tag'];
      $bahan_bahan = $_POST['bahan_bahan'];
      $langkah_resep = $_POST['langkah_resep'];

      $id_user = $userdata[0];
      $id_kategori = $_POST['kategori'];


      
      $query = "
        INSERT INTO `resep` (`id_pengguna`, `id_kategori`, `nama`, `porsi`, `durasi`, `deskripsi`, `tag`, `bahan_bahan`, `langkah_resep`) 
        VALUES ('$id_user','$id_kategori','$nama', '$porsi', '$durasi', '$deskripsi', '$tag', '$bahan_bahan', '$langkah_resep');
      
      ";
      $data =  $this->executeQuery($query);

      if($data){
        header('location:index.php?c=myresep&m=index');
      }
      
    }

    public function postEdit()
    {

      $userdata = $_SESSION['loginedUserDetail'][0];
      $id = $_POST['id'];
      $nama = $_POST['nama'];
      $porsi = $_POST['porsi'];
      $durasi = $_POST['durasi'];
      $deskripsi = $_POST['deskripsi'];
      $tag = $_POST['tag'];
      $bahan_bahan = $_POST['bahan_bahan'];
      $langkah_resep = $_POST['langkah_resep'];

      $id_user = $userdata[0];
      $id_kategori = $_POST['kategori'];


      $query = "
        UPDATE `resep` SET 
          `id_pengguna` = '$id_user' ,
          `id_kategori` = '$id_kategori' ,
          `nama` = '$nama' ,
          `porsi` = '$porsi' ,
          `durasi` = '$durasi' ,
          `deskripsi` = '$deskripsi' ,
          `tag` = '$tag' ,
          `bahan_bahan` = '$bahan_bahan' ,
          `langkah_resep` = '$langkah_resep'  
        WHERE `id` = '$id'
      
      ";
      $data =  $this->executeQuery($query);

      if($data){
        header('location:index.php?c=myresep&m=index');
      }
      
    }
    
  }
?>