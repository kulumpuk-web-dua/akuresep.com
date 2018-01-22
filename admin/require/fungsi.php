<?php 
if(!defined("web")) die();

function is_get($name)
{
	return isset($_GET[$name]);
}

function get($name)
{
	return is_get($name) ? $_GET[$name] : '';
}

function is_post($name)
{
	return isset($_POST[$name]);
}

function post($name)
{
	return is_post($name) ? $_POST[$name] : '';
}

function filter(&$array) {
    $clean = array();
    foreach($array as $key => &$value ) {
        if( is_array($value) ) {
            filter($value);
        } else {
            $value = trim(strip_tags($value));
            if (get_magic_quotes_gpc()) {
                $data = stripslashes($value);
            }
            $data = mysql_real_escape_string($value);
        }
    }
}

function show_error($code=404)
{
  require 'require/config.php';
  require 'require/header.php';
  require 'require/app/404.php';
  require 'require/footer.php';
  exit;
}

function clean($data,$text=false) {
    if ($text) {
      return mysql_real_escape_string(stripslashes(trim($data)));
    }
    $data = trim(htmlentities(strip_tags($data)));

    if (get_magic_quotes_gpc()) {
        $data = stripslashes($data);
    }
    $data = mysql_real_escape_string($data);

    return $data;
}

function uploadImage($uploadField) {
  $target_dir = "../../statics/image/";
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
  return $uploaded == 1 ? $filename : $messages;
}

function flash($name, $message=false)
{
  if ($message) {
    $_SESSION['flash'][$name] = $message;
    $_SESSION['flash']['time'] = time();
  }
  return isset($_SESSION['flash'][$name]) ? $_SESSION['flash'][$name] : false;
}

function insert($table, $data)
{ 
  $query = "INSERT INTO $table (".implode(',', array_keys($data)).") VALUES ('".implode("','", $data)."')";
  return (mysqli_query($GLOBALS['con'] ,$query)) ? true : false;
}

function delete($table, $data)
{ 
  $where = [];
  foreach ($data as $key => $value) {
    $where[] = "$key='$value'";
  }
  $query = "DELETE FROM $table WHERE ".implode(',', $where);
  return (mysqli_query($GLOBALS['con'] ,$query)) ? true : false;
}

function update($table, $set, $data)
{	
  $where = [];
  foreach ($data as $key => $value) {
    $where[] = "$key='$value'";
  }

  $value = [];
  foreach ($set as $key => $val) {
    $value[] = "$key='$val'";
  }

	$query = "UPDATE $table SET ".implode(',', $value)." WHERE ".implode(',', $where);
	return (mysqli_query($GLOBALS['con'] ,$query)) ? true : false;
}

function exec_query($query)
{
	$hasil = [];
	if ($result=mysqli_query($GLOBALS['con'] ,$query))
      {
        while($row = mysqli_fetch_assoc($result)){
          array_push($hasil, $row);
        }
        mysqli_free_result($result);
      }
      return $hasil;
}

function count_query($query)
{
	$hasil = 0;
	if ($result=mysqli_query($GLOBALS['con'] ,$query))
      {
        $hasil = mysqli_num_rows($result);
        mysqli_free_result($result);
      }
      return $hasil;
}

function queryString($str,$val)
  {
    $queryString = array();
    $queryString = $_GET;
    $queryString[$str] = $val;
    $queryString = "?".htmlspecialchars(http_build_query($queryString),ENT_QUOTES);
 
    return $queryString;
  }

function paginate($total,$link,$perpage)
{
  $page = (isset($_GET['page']))? $_GET['page'] : 1;
          
  $limit = $perpage;
    
  $limit_start = ($page - 1) * $limit;

  $container = '<nav aria-label="paging"><ul class="pagination">';
  if($page == 1){ 
    $container .= '
      <li class="page-item disabled"><a class="page-link" href="#">First</a></li>
      <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
      ';
  }else{ 
    $link_prev = ($page > 1)? $page - 1 : 1;
    $container .= '
      <li class="page-item"><a class="page-link" href="'.$link.queryString('page',1).'">First</a></li>
      <li class="page-item"><a class="page-link" href="'.$link.queryString('page',$link_prev).'">&laquo;</a></li>
      ';
  }
  $jumlah = $total;
  
  $jumlah_page = ceil($jumlah / $limit);
  $jumlah_number = 3; 
  $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; 
  $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
  
  for($i = $start_number; $i <= $end_number; $i++){
    $link_active = ($page == $i)? 'active' : '';
    $container .= '<li class="page-item '.$link_active.'"><a class="page-link" href="'.$link.queryString('page',$i).'">'.$i.'</a></li>';
  
  }
  
  if($page == $jumlah_page){ // Jika page terakhir
    $container .= '
      <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
      <li class="page-item disabled"><a class="page-link" href="#">Last</a></li>
      ';
  }else{ // Jika Bukan page terakhir
    $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
    $container .= '
    <li class="page-item"><a class="page-link" href="'.$link.queryString('page',$link_next).'">&raquo;</a></li>
    <li class="page-item"><a class="page-link" href="'.$link.queryString('page',$jumlah_page).'">Last</a></li>
    ';
  }
  $container .= '</ul></nav>';

  return [
    'link' => $container,
    'offset' => $limit_start,
    'perpage' => $perpage,
  ];
  
}

