<?php 
  if(!defined("YO")) die();
  class MyresepController extends BaseController{

    public function __construct()
    {
      $this->isLoginedUser();
    }

    public function index()
    {

      $userdata = $_SESSION['loginedUserDetail'];

       $data = [];

      $where = '';
      if (get('search')!='') {
        $where = "AND (resep.nama like '%".get('search')."%' OR resep.nama like '%".get('search')."%')";
      }

      $query = "SELECT resep.*, pengguna.nama_depan, pengguna.nama_belakang  ,
      (select max(gambar)  from detail_gambar where id_resep = resep.id and utama = '1') as gambar_utama
      from resep LEFT JOIN pengguna ON pengguna.id=resep.id_pengguna WHERE resep.id_pengguna=$userdata[id] $where";

      $data['total'] = $this->countQuery($query);

      $data['paginate'] = paginate($data['total'],'index.php',12);

      $data['reseps'] = $this->getDataAsObject("$query ORDER BY resep.dibuat_pada DESC LIMIT ".$data['paginate']['perpage']." OFFSET ".$data['paginate']['offset']);

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

      $userdata = $_SESSION['loginedUserDetail'];
      $nama = $_POST['nama'];
      $porsi = $_POST['porsi'];
      $durasi = $_POST['durasi'];
      $deskripsi = $_POST['deskripsi'];
      $tag = $_POST['tag'];
      $bahan_bahan = $_POST['bahan_bahan'];
      $langkah_resep = $_POST['langkah_resep'];

      $id_user = $userdata['id'];
      $id_kategori = $_POST['kategori'];

      $upload =  $this->uploadImage('gambar');
      $query = "
        INSERT INTO `resep` (`id_pengguna`, `id_kategori`, `nama`, `porsi`, `durasi`, `deskripsi`, `tag`, `bahan_bahan`, `langkah_resep`,`dibuat_pada`) 
        VALUES ('$id_user','$id_kategori','$nama', '$porsi', '$durasi', '$deskripsi', '$tag', '$bahan_bahan', '$langkah_resep',NOW());
        
      ";
      $data =  $this->executeQuery($query);
      $resep_id = $this->conn->insert_id;
      if($upload != ""){
        $query = "
        INSERT INTO `detail_gambar` (`id_resep`, `gambar`, `utama`) 
        VALUES ('$resep_id','$upload','1');
        ";
        $this->executeQuery($query);
      }
      if($data){
        header('location:index.php?c=myresep&m=index');
      }
      
    }

    public function postEdit()
    {

      $userdata = $_SESSION['loginedUserDetail'];
      $id = $_POST['id'];
      $nama = $_POST['nama'];
      $porsi = $_POST['porsi'];
      $durasi = $_POST['durasi'];
      $deskripsi = $_POST['deskripsi'];
      $tag = $_POST['tag'];
      $bahan_bahan = $_POST['bahan_bahan'];
      $langkah_resep = $_POST['langkah_resep'];

      $id_user = $userdata['id'];
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
          `langkah_resep` = '$langkah_resep',
          `diubah_pada` = NOW()

        WHERE `id` = '$id'
      
      ";
      $data =  $this->executeQuery($query);

      if($data){
        header('location:index.php?c=myresep&m=index');
      }
      
    }


  }
?>