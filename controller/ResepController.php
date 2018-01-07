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
      $data['resep'] = $this->getDataAsObject("SELECT resep.*, pengguna.nama_depan, pengguna.nama_belakang, kategori.nama as nama_kategori,
        (select max(gambar) from detail_gambar where id_resep = resep.id and utama = '1') as gambar_utama
        from resep 
        LEFT JOIN kategori ON kategori.id=resep.id_kategori 
        LEFT JOIN pengguna ON pengguna.id=resep.id_pengguna 
        WHERE resep.id = '$idResep'");
      $data['user'] = $_SESSION['loginedUserDetail'][0];
      $data['gambar'] = $this->getDataAsObject("SELECT * FROM detail_gambar where id_resep = '$idResep'");
      $data['komentar'] = $this->getDataAsObject("SELECT diskusi.*,  (pengguna.nama_depan) as nama_pengguna from diskusi_resep as diskusi join pengguna where diskusi.id_pengguna =  pengguna.id and  diskusi.id_resep = '$idResep'");
      echo $this->view('view/resep/detail.php', $data);
    }

    public function search()
    {
      $data = [];

      $page =  isset($_GET['page']) ? $_GET['page'] : '1';
      $offset =  isset($_GET['offset']) ? $_GET['offset'] : '8';
      $page =  ($page - 1) * $offset;

      $_GET['search'] = isset($_GET['search']) ? $_GET['search'] : $_POST['search']; 
      $search = $_GET['search'];
      $data['reseps'] = $this->getDataAsObject("SELECT resep.*, pengguna.nama_depan, pengguna.nama_belakang  ,
      (select max(gambar)  from detail_gambar where id_resep = resep.id and utama = '1') as gambar_utama
      from resep LEFT JOIN pengguna ON pengguna.id=resep.id_pengguna WHERE resep.nama like '%$search%' OR pengguna.nama_depan like '%$search%' OR pengguna.nama_belakang like '%$search%'
      limit $page , $offset");

      $data['pagination'] = $this->getPaginationStatus('resep', '10',"WHERE resep.nama like '%$search%'");

      echo $this->view('view/home/search.php', $data);
    }

    public function addComment() {

      $userdata = $_SESSION['loginedUserDetail'][0];
      $id_user =  $userdata[0];
      $idResep = $_GET['id'];
      $pesan =  $_POST['pesan'];
      $date = date('Y-m-d h:i:s'); //2018-10-10 00:00:00
      $query = "
        INSERT INTO `diskusi_resep` (`id_pengguna`, `id_resep`, `pesan`, `dibuat_pada`) 
        VALUES ('$id_user','$idResep','$pesan', '$date');
        
      ";
      $data =  $this->executeQuery($query);
      if($data) {
        header("location:index.php?c=resep&m=detail&id=$idResep");
      }
    }
  }
?>