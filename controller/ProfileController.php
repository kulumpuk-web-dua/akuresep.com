<?php 
  if(!defined("YO")) die();
  class ProfileController extends BaseController{

    public function __construct()
    {
      $this->isLoginedUser();
    }
    
    public function index()
    {
      $userdata = $_SESSION['loginedUserDetail'];
      $data = [];

      $query = "SELECT resep.*, pengguna.nama_depan, pengguna.nama_belakang  ,
      (select max(gambar)  from detail_gambar where id_resep = resep.id and utama = '1') as gambar_utama
      from resep LEFT JOIN pengguna ON pengguna.id=resep.id_pengguna WHERE resep.id_pengguna=$userdata[id] LIMIT 4";

      $data['reseps'] = $this->getDataAsObject($query);

      echo $this->view('view/profile/index.php', $data);
      # code...
    }

    public function ubahProfile()
    {
      $data = [];
      echo $this->view('view/profile/edit.php', $data);
    }

    public function postProfile()
    {
      $userdata = $_SESSION['loginedUserDetail'];
      $id = $userdata['id'];
      $nama_depan = post('nama_depan');
      $nama_belakang = post('nama_belakang');
      $pekerjaan = post('pekerjaan');


      $gambar = "";
      if($_FILES['poto']['name'] != "") {
        $gambar = ", poto='".$this->uploadImage('poto')."'";
      }

      $query = "
        UPDATE `pengguna` SET 
          `nama_depan` = '$nama_depan' ,
          `nama_belakang` = '$nama_belakang' ,
          `pekerjaan` = '$pekerjaan'
          $gambar

        WHERE `id` = '$id'
      
      ";
      $data =  $this->executeQuery($query);

      if($data){
        $this->updateSessionUser();
        header('location:index.php?c=profile');
      }
    }

    public function komentarSaya()
    {
      $data = [];
      $userdata = $_SESSION['loginedUserDetail'];
      $data['komentars'] = $this->getDataAsObject("SELECT diskusi_resep.*,resep.nama,resep.id as id_resep FROM diskusi_resep INNER JOIN resep ON diskusi_resep.id_resep = resep.id where diskusi_resep.id_pengguna = '$userdata[id]' ORDER BY diskusi_resep.dibuat_pada DESC");
      echo $this->view('view/profile/komentar.php', $data);
    }

    public function delKomentar()
    {
      $query = "DELETE FROM diskusi_resep WHERE id = '" . $_GET['id'] . "'";
      $data =  $this->executeQuery($query);
      
      if($data){
        header('location:index.php?c=profile&m=komentarSaya');
      }
    }


    public function ubahPassword()
    {
      $data = [];
      echo $this->view('view/profile/ubahpassword.php', $data);
    }

    public function postPassword()
    {
      $userdata = $_SESSION['loginedUser'];
      $id = $userdata->id;
      $old_pass = post('old_pass');
      $new_pass = post('new_pass');
      $ver_pass = post('ver_pass');

      if ($old_pass!=$userdata->password) {
        header('location:index.php?c=profile&m=ubahPassword&error=Password Lama Tidak Sesuai.');
      }

      if ($new_pass!=$ver_pass) {
        header('location:index.php?c=profile&m=ubahPassword&error=Password Tidak Cocok.');
      }

      $query = "
        UPDATE `login` SET 
          `password` = '$new_pass'
        WHERE `id` = '$id'
      
      ";
      $data =  $this->executeQuery($query);

      if($data){
        $this->updateSessionUser();
        header('location:index.php?c=profile');
      }
    }
  }
?>