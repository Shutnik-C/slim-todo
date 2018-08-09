<?php
  use voku\db\DB;

  $config = require('../config/config.php');
  require('../models/UserModel.php');

  $app = new \Slim\App($config);

  session_start();

  $container = $app->getContainer();

  $container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ .'/view',['cache' => false,]);

    $view->addExtension(new \Slim\Views\TwigExtension(
      $container->router,
      $container->request->getUri()
    ));

    return $view;
  };

  $container['AuthorizationController'] = function ($container) {
    return new AuthorizationController($container);
  };

  $container['ToDoController'] = function ($container) {
    return new ToDoController($container);
  };

  $container['user'] = function () {
    return new UserModel(0,"","");
  };

  $container['db'] = function (){
    //$db = DB::getInstance("localhost:3310","root","1234","todobd");
    $config = require('../config/config.php');

    $host = $config['db']['host'];
    $user = $config['db']['user'];
    $password = $config['db']['password'];
    $database = $config['db']['database'];
    $db = DB::getInstance($host,"root","1234","todobd");
    //$db = DB::getInstance($host, $user, $password, $database);
    $db->set_charset("utf8");

    return $db;
  }

  //$db = new DataBase("localhost","root","");

  //$db = new mysqli("localhost","ROOT","1234","todobd");
  //$db->set_charset("utf8");

?>
