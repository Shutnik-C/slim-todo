<?php
require "BaseMiddleware.php";

  class AuthoriaztionMiddleware extends BaseMiddleware
  {
    public function Check($request, $response, $next)//переход к ToDolist после аутентификации
    {
      if(!isset($_SESSION['login']))//проверка на переход без аутентификации
      {
        $response = $next($request, $response);
        return $response;
      }
      else
        return $response->withRedirect('/todo');
    }

    public function Home($request, $response, $next)//переход к главной странице todo
    {
      //$response->getBody()->write("что-то");
      if(!isset($_SESSION['login']))//проверка на переход без аутентификации
        return $response->withRedirect('/');
      else {
        $response = $next($request, $response);
        return $response;
      }
    }

    public function Logout($request, $response, $next)//выход с аккаунта
    {
      session_unset();//очищаешь массив $_SESSION
      $response = $next($request, $response);
      return $response;
    }

  }
?>
