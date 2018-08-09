<?php
//require '../vendor/autoload.php';
require "BaseController.php";
//include "../models/UserModel.php";
//require "../../models/TestData.php";

class AuthorizationController extends BaseController//класс-контройлер для авторизации
{
  public function Home($request, $response, $args)//переход на начальную страница
  {
    return $this->view->render($response, 'home.html');
  }

  public function Auth($request, $response, $args)//перезод на страницу авторизации
  {
    return $this->view->render($response, 'auth/auth.html');
  }

  public function Login($request, $response, $args)//вход под аккаутном
  {
    if(!isset($_POST['login']) || !isset($_POST['password']))//проверка на передачу параметров
      return $response->withRedirect('/auth/error');

    $login = $_POST['login'];

    $user = $this->db->query("SELECT login FROM users;");
    $is = false;

    for ($i=0; $i < count($user); $i++)
    {
      if ($login == $user[$i]['login'])
      {
        $is = true;
        break;
      }
    }

    if($is == false)//проверка на наличие такого пользователя в базе
      return $response->withRedirect('/auth/error');

    $user = $this->db->query("SELECT * FROM users WHERE login = :login;", ["login" => $login]);

    if(!password_verify($_POST['password'], $user[0][password]))//проверка на совпадение пароля
      return $response->withRedirect('/auth/error');

    $_SESSION['login'] = $login;//добавление в сессию логина пользователя
    $_SESSION['id'] = $user[0][id];//добавление в сессию логина пользователя
    //$this->user->setId($user[0][id]);//добавление в контейнер id пользователя
    //$this->user->setLogin($user[0][login]);
    return $response->withRedirect('/');

  }

  public function Logout($request, $response, $args)//выход с аккаунта
  {
    session_unset();//очищаешь массив $_SESSION
    //session_destroy();
    return $response->withRedirect('/');
  }

  public function Registration($request, $response, $args)//переход на страницу регистрации
  {
    return $this->view->render($response, 'auth/registration.html');
  }

  public function Registrate($request, $response, $args)//переход на страницу регистрации
  {
    if(!isset($_POST['login']) || !isset($_POST['password']) || !isset($_POST['again_password']))//проверка на передачу параметров
      return $response->withRedirect('/auth/error');

    if($_POST['login'] == "" || $_POST['password'] == "" || $_POST['again_password'] == "")//проверка на заполненость полей
      return $response->withRedirect('/auth/error');

    if($_POST['password'] == $_POST['again_password'])//проверка на совпадание паролей
    {
      $login = $_POST['login'];
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

      $users = $this->db->query("SELECT login FROM users;");

      for ($i=0; $i < count($users); $i++)
      {
        if ($login == $users[0]['login'])
        {
          return $response->withRedirect('/auth/error');
        }
      }

      $this->db->query("INSERT INTO users (login, password) VALUES (:login, '$password');", ["login" => $login]);

      $_SESSION['login'] = $login;//добавление в сессию логина пользователя
      $users = $this->db->query("SELECT id FROM users WHERE login = :login;", ["login" => $login]);
      $_SESSION['id'] = $users[0]['id'];//добавление в сессию id пользователя
      $test = $users[0][id];

      //$this->user->setId($users[0][id]);
      //$this->user->setLogin($login);
      //$this->user->setPasswordHash(password_hash($_POST['password'], PASSWORD_DEFAULT));

      return $response->withRedirect('/');

    }
    else
      return $response->withRedirect('/auth/error');
  }

  public function Error($request, $response, $args)//переход на страницу ошибки
  {
    return $this->view->render($response, 'auth/error.html');
  }
}
?>
