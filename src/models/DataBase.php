<?php
class DataBase
{
  protected $host;//хост для подключения к БД
  protected $user;//логин пользователя для подключения к БД
  protected $password;//пароль пользователя для подключения к БД
  protected $database;//имя подключаемой база данных

  function ToDoItem($new_host, $new_user, $new_password, $new_database)
  {
    $this->$host = $new_host;
    $this->$user = $new_user;
    $this->$password = $new_password;
    $this->$database = $new_database;
  }

  function setHost($new_val)//назначение хоста
  {
    $this->$host = $new_val;
  }

  function getHost()//возвращение хоста
  {
    return $this->$host;
  }

  function setUser($new_val)//назначение пользователя
  {
    $this->$user = $new_val;
  }

  function getUser()//возвращение пользователя
  {
    return $this->$user;
  }

  function setPassword($new_val)//назначение пароля
  {
    $this->$password = $new_val;
  }

  function setDataBase($new_val)//назначение имени базы данных
  {
    $this->$database = $new_val;
  }

  function getDataBase()//возвращение имени базы данных
  {
    return $this->$database;
  }

}
?>
