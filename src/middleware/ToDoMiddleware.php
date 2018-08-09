<?php
//require "BaseMiddleware.php";

  class ToDoMiddleware extends BaseMiddleware
  {
    public function Add($request, $response, $next)
    {
        if(isset($_POST['add_btn']) && isset($_POST['todo_text']) && $_POST['todo_text'] != "")
        {
          //$this->db->query("INSERT INTO users (login, password) VALUES (:login, '$password');", ["login" => $login]);
          //$this->db->query("INSERT INTO users (login, password) VALUES ('login', 'password');", ["login" => $login]);
          $t = $_POST['todo_text'];
          //$this->db->query("INSERT INTO todolist (todo) VALUES ('asd');");
          $response->getBody()->write("что-то добавлено");
          $test = $_POST['todo_text'];
          $response->getBody()->write("$test");
        }
        $response = $next($request, $response);
        return $response;
    }
  }
?>
