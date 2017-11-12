<?php 
  class AuthController extends BaseController{
    
    public function __construct(){
    }

    public function login()
    {
      $this->isGuest();
      $this->isGet();
      $data = ['data' => ['data' => 'yo !']];

      echo $this->view('view/login/index.php', $data);
      # code...
    }

    public function postLogin() 
    {
      $this->isGuest();
      $this->isPost();
      $email = $_POST['email'];
      $password = $_POST['password'];
      $query = "SElECT id,email,type FROM login  WHERE email = '$email' AND password = '$password'";
      $data =  $this->getDataAsObject($query);
      if($data){
        $this->logMeIn($data);
        header('location:index.php?c=home');
      }else{
        header('location:index.php?c=auth&m=login');
      }
    }

    public function postLogout() 
    {
      $this->isLoginedUser();
      $this->logMeOut();
      header('location:index.php?c=auth&m=login');
      
    }

    public function register()
    {
      $this->isGuest();
      $this->isGet();
      $data = ['data' => ['data' => 'yo !']];

      echo $this->view('view/register/index.php', $data);
      # code...
    }

    public function postRegister() 
    {
      $this->isGuest();
      $this->isPost();
      $nama_depan = $_POST['nama_depan'];
      $nama_belakang = $_POST['nama_belakang'];
      $pekerjaan = $_POST['pekerjaan'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      $query = "
        INSERT INTO `login` ( `email`, `password`, `type`) 
        VALUES ( '$email', '$password', 'pengguna');
      ";
      $data =  $this->executeQuery($query);

      if($data){
        $query = "
          INSERT INTO `pengguna` (`nama_depan`, `nama_belakang`, `email`, `pekerjaan`) 
          VALUES ('$nama_depan','$nama_depan', '$email', '$pekerjaan');
        ";
        $data =  $this->executeQuery($query);
        header('location:index.php?c=auth&m=login');
      }else{
        header('location:index.php?c=auth&m=register');
      }
    }

  }
?>