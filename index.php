<?php
session_start();
require_once __DIR__.'/library/RequirePage.php';
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/library/Twig.php';
require_once __DIR__.'/library/CheckSession.php';
require_once __DIR__.'/library/Privileges.php';
require_once __DIR__.'/library/JournalDeBord.php';

$GLOBALS['PATH'] = 'http://claire1/travaux-session3/librairie3';

$url = isset($_GET['url']) ? explode('/', ltrim($_GET['url'], '/')) : '/';

if($url == '/'){
  $_SESSION['url'] = $url;
  JournalDeBord::Enregistrer();
  CheckSession::SessionAuth();
  $controllerHome = __DIR__.'/controller/ControllerHome.php';
  require_once $controllerHome;
  $controller = new ControllerHome;
  echo $controller->index();
}else{
  if(count($url)>1){
    $_SESSION['url'] = $url[0].'/'.$url[1];
  }else{
    $_SESSION['url'] = $url[0];
  }
  JournalDeBord::Enregistrer();
  $requestURL=$url[0];
  if($requestURL != 'login' && $requestURL != 'user'){
    CheckSession::SessionAuth();
  }
  $requestURL = ucfirst($requestURL);
  $controllerPath = __DIR__.'/controller/Controller'.$requestURL.'.php';
/*   echo $controllerPath; */
  
  if(file_exists($controllerPath)){
    require_once $controllerPath;
    $controllerName = 'Controller'.$requestURL;
    $controller = new $controllerName;
    if(isset($url[1])){
      $method = $url[1];
      if(isset($url[2])){
        $value = $url[2];
        echo $controller->$method($value);
      }else{
        echo $controller->$method();
      }
    }else{
      echo $controller->index();
    }
  }
  else{
    $controllerHome = __DIR__.'/controller/ControllerHome.php';
    require_once $controllerHome;
    $controller = new ControllerHome;
    echo $controller->error();
  }
}


?>