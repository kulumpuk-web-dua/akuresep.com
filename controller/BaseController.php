<?php 
  if(!defined("YO")) die();
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

    public function echoIsset($value, $key) {
      echo(isset($value) ? $value->$key : '');
    }

    public function uploadImage($uploadField) {
      $target_dir = "statics/image/";
      $target_file = $target_dir . basename( $_FILES[$uploadField]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $messages = "";

      $filename = md5(date('ddmm-yyyy:hh-iiss')). ("." . $imageFileType);
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES[$uploadField]["tmp_name"]);
          if($check !== false) {
            $messages = "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            $messages = "File is not an image.";
            $uploadOk = 0;
          }
      }
      // Check if file already exists
      // if (file_exists($target_file)) {
      //     $messages =  "Sorry, file already exists.";
      //     $uploadOk = 0;
      // }
      // Check file size
      if ($_FILES[$uploadField]["size"] > 500000) {
          $messages = "Sorry, your file is too large.";
          $uploadOk = 0;
      }
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
          $messages = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      $uploaded = 0;
      if ($uploadOk == 0) {
          // $messages = "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
          $uploadTo = $target_dir . $filename ;
          if (move_uploaded_file($_FILES[$uploadField]["tmp_name"], $uploadTo)) {
            $messages = "The file ". basename( $_FILES[$uploadField]["name"]). " has been uploaded.";
            $uploaded = 1;
          } else {
            $messages = "Sorry, there was an error uploading your file.";
          }
      }
      return $uploaded == 1 ? $filename : "";
    }
  }
  
?>