<?php 
  if(!defined("YO")) die();
  class ResepController extends BaseController{
    public function index()
    {
      $data = [];

      $where = '';
      if (get('search')!='') {
        $where = "WHERE resep.nama like '%".get('search')."%' OR resep.nama like '%".get('search')."%'";
      }

      $query = "SELECT resep.*, pengguna.nama_depan, pengguna.nama_belakang  ,
      (select max(gambar)  from detail_gambar where id_resep = resep.id and utama = '1') as gambar_utama
      from resep LEFT JOIN pengguna ON pengguna.id=resep.id_pengguna $where";

      $data['total'] = $this->countQuery($query);

      $data['paginate'] = paginate($data['total'],'index.php',10);

      $data['reseps'] = $this->getDataAsObject("$query ORDER BY resep.dibuat_pada DESC LIMIT ".$data['paginate']['perpage']." OFFSET ".$data['paginate']['offset']);




      echo $this->view('view/home/resep.php', $data);
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
      $data['user'] = $_SESSION['loginedUserDetail'];
      $data['gambar'] = $this->getDataAsObject("SELECT * FROM detail_gambar where id_resep = '$idResep'");
      $data['komentar'] = $this->getDataAsObject("SELECT diskusi.*,  (pengguna.id) as id_pengguna, (pengguna.nama_depan) as nama_pengguna, (pengguna.poto) as poto_pengguna from diskusi_resep as diskusi join pengguna where diskusi.id_pengguna =  pengguna.id and  diskusi.id_resep = '$idResep' order by diskusi.dibuat_pada DESC ");
      echo $this->view('view/resep/detail.php', $data);
    }

    public function search()
    {
      $this->index();
    }

    public function addComment() {

      $userdata = $_SESSION['loginedUserDetail'];
      $id_user =  $userdata['id'];
      $idResep = $_POST['resep'];
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