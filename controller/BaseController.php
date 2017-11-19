<?php 
  class BaseController
  {
    public $conn;


    public function bukaDb () {
      $this->conn = mysqli_connect("localhost","root","","akuresep");
      // Check connection
      if (mysqli_connect_errno())
      {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
    }

    public function view($viewName,$data = [])
    {

      ob_start();                      // start capturing output
      include($viewName);   // execute the file
      $view = ob_get_contents();    // get the contents from the buffer
      ob_end_clean();  
      return $view;
      # code...
    }
    
    public function getDataAsArray($query) {
      $this->bukaDb();
      $hasil = [];
      if ($result=mysqli_query($this->conn ,$query))
      {
        // Fetch one and one row
        while($row = mysqli_fetch_row($result)){
          array_push($hasil, $row);
        }
        // Free result set
        mysqli_free_result($result);
      }
      mysqli_close($this->conn);
      return $hasil;
    }
    
    public function getDataAsObject($query) {
      $this->bukaDb();
      $hasil = [];
      if ($result=mysqli_query($this->conn ,$query))
      {
        // Fetch one and one row

        while($row = mysqli_fetch_object($result)){
          array_push($hasil, $row);
        }
        // Free result set
        mysqli_free_result($result);
      }
      mysqli_close($this->conn);
      return $hasil;
    }

    public function executeQuery($query) {
      $this->bukaDb();
      if (mysqli_query($this->conn, $query)) {
          return  true;
      } else {
          dd("Error: " . $query . "<br>" . mysqli_error($this->conn));
      }
    }

    public function isPost() {
      
      if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo "Request Not Valid";
        die();
      }
    }

    public function isGet() {
      if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        echo "Request Not Valid";
        die();
      }
    }

    public function isGuest() {
      if($_SESSION['loginedUser']){
        header('location:index.php?c=home');
      }
    }

    public function isLoginedUser() {
      if(!$_SESSION['loginedUser']){
        header('location:index.php?c=auth&m=login');
      }
    }

    public function logMeIn($userData) {
      $_SESSION['loginedUser'] = $userData;
      $_SESSION['loginedUserDetail'] = $this->getUserDetail();
    }

    public function logMeOut() {
      $_SESSION['loginedUser'] = null;
      $_SESSION['loginedUserDetail'] = null;
    }

    public function getUserDetail() {
      $loginedUser = $_SESSION['loginedUser'][0];
      if($loginedUser) {
        $table = strtolower($loginedUser->type);
        $query = "SElECT * FROM $table WHERE email = '$loginedUser->email'";
        $data =  $this->getDataAsArray($query);
        return $data;
      }
      return null;
    }
  }
  
?>