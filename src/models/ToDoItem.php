<?php

class ToDoItem
{
  protected $id;//идентификатор записи todo
  protected $status;//статус todo
  protected $todo;

  function ToDoItem($new_id, $new_status, $new_todo)
  {
    $this->$id = $new_id;
    $this->$status = $new_status;
    $this->$todo = $new_todo;
  }

  function setId($new_val)//назначение идентификатора
  {
    $this->$id = $new_val;
  }

  function getId()//возвращение идентификатора
  {
    return $this->$id;
  }

  function setStatus($new_val)//назначение статуса
  {
    $this->$status = $new_val;
  }

  function getStatus()//возвращение статуса
  {
    return $this->$status;
  }

  function setTodo($new_val)//назначение todo
  {
    $this->$todo = $new_val;
  }

  function getTodo()//возвращение todo
  {
    return $this->$todo;
  }
}
?>
