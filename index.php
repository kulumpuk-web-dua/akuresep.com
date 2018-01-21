<?php 

date_default_timezone_set("UTC");
  define('YO', "HA");
  include('controller/BaseController.php');
  
  session_start();

  if(!isset($_SESSION['loginedUser'])) {
    $_SESSION['loginedUser'] = null;
  }
  if(!isset($_SESSION['loginedUserDetail'])) {
    $_SESSION['loginedUserDetail'] = null;
  }

  function dd($var) {
    var_dump($var);
    die();
  }

  function post($name)
  {
    return (isset($_POST[$name])) ? $_POST[$name] : '';
  }

  function get($name)
  {
    return (isset($_GET[$name])) ? $_GET[$name] : '';
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

  // dd($_GET);
  $controller = isset($_GET['c']) ? $_GET['c'] : 'home';
  $method = isset($_GET['m']) ? $_GET['m'] : 'index';
  
  if($controller) {
    $controllerName =  ucfirst($controller) . 'Controller';
    if (!file_exists("controller/$controllerName.php")) {
      include 'view/home/error404.php';
      exit;
    }
    include("controller/$controllerName.php");
    $controller = new $controllerName();
  }
  if(!$controller || !method_exists($controller, $method)){
    include 'view/home/error404.php';
    exit;
  }else{
    call_user_func([$controller, $method]);
  }

?>