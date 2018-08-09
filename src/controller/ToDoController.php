<?php
//require "BaseController.php";
require '../vendor/autoload.php';

class ToDoController extends BaseController
{
  public function Home($request, $response, $args)//переход на домашнюю страницу
  {
    return $this->view->render($response, 'todo/ToDoListHome.html',['name'=> $_SESSION['login']]);
  }

  public function Get($request, $response, $args)//переход на отображения таблицы
  {
    if(isset($_POST['status_btn']))
    {
      if($_POST['status'] == 0)
      {
        $this->db->query("UPDATE  todolist SET status = 1 WHERE id = :id;", ["id" => $_POST['id']]);
      }
      else
      {
        $this->db->query("UPDATE  todolist SET status = 0 WHERE id = :id;", ["id" => $_POST['id']]);
      }
    }

    $todos = $this->db->query("SELECT * FROM todolist WHERE id_user = :id;", ["id" => $_SESSION['id']]);
    return $this->view->render($response, 'todo/ToDoList.html', ['todos' => $todos]);
  }

  public function Add($request, $response, $args)
  {
    return $this->view->render($response, 'todo/ToDoListAdd.html');
  }

  public function Adding($request, $response, $args)
  {
    if(isset($_POST['add_btn']) || isset($_POST['add_again_btn']))
      if(isset($_POST['todo_text']) && $_POST['todo_text'] != "")
        $this->db->query("INSERT INTO todolist (status, todo, id_user) VALUES (0, :todo, :id_user);", ["todo" => $_POST['todo_text'], "id_user" => $_SESSION['id']]);

    if(isset($_POST['add_btn']))
      return $response->withRedirect('/todo/get');
    if(isset($_POST['add_again_btn']))
      return $response->withRedirect('/todo/add');
  }

  public function Edit($request, $response, $args)
  {

    $id = -1;
    if(isset($_POST['id']) && !isset($_POST['edit_cancel_btn']))
      $id = $_POST['id'];

    if(isset($_POST['edit_ok_btn']))
    {
      $this->db->query("UPDATE todolist SET todo = :todo WHERE id = $id;", ['todo' => $_POST['edit_text']]);
      $id = -1;
    }


    if(isset($_POST['delete_btn']))
      $this->db->query("DELETE FROM todolist WHERE id = $id;");

    $todos = $this->db->query("SELECT * FROM todolist WHERE id_user = :id;", ['id' => $_SESSION['id']]);
    return $this->view->render($response, 'todo/ToDoListEdit.html', ['todos' => $todos, 'id_item' => $id]);
  }
}
?>
